<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustProject;
use App\Models\CustSocail;
use App\Models\BusinessDrive;
use App\Models\BusinessNeed;
use App\Models\BusinessSituation;
use App\Models\CustData;
use App\Models\ProjectHost;
use App\Models\ProjectContact;
use App\Models\User;
use App\Models\ProjectPersonnel;
use App\Models\ManufactureNeed;
use App\Models\ManufactureExpected;
use App\Models\ManufactureImprove;
use App\Models\ManufactureSubsidy;
use App\Models\ManufactureNorm;
use App\Models\ProjectAppendix;
use Carbon\Carbon;
use App\Models\Word;
use App\Models\WordQuestion;
use App\Models\WordPlan;
use App\Models\WordPartner;
use App\Models\WordEffectiveness;
use App\Models\WordBenefit;
use App\Models\WordFund;
use App\Models\WordPlanned;
use App\Models\WordReductionItem;
use App\Models\WordCustomPerformance;
use App\Models\ManufactureThreeIncome;
use App\Models\ManufactureIso;
use App\Models\WordCheck;
use App\Models\WordServe;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor; // 確保引入正確的類別
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Shape\RichText;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Fill;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Style\ParagraphStyle;
use PhpOffice\PhpPresentation\Shape\Rectangle;
use PhpOffice\PhpPresentation\DocumentLayout;


class PptController extends Controller
{
    public function exportPtt($id)
    {
        // 獲取客戶資料
        $user_data = User::where('id', $id)->first();
        $cust_data = CustData::where('user_id', $id)->first();
        $project = CustProject::where('user_id', $id)->where('type', 0)->first();
        $word_data = Word::where('user_id', $id)->first();
        $word_questions = WordQuestion::where('user_id', $id)->where('project_id', $project->id)->get();
        $project_host_data = ProjectHost::where('user_id', $id)->where('project_id', $project->id)->first();
        $project_contact_data = ProjectContact::where('user_id', $id)->where('project_id', $project->id)->first();
        $word_plans = WordPlan::where('user_id', $id)->where('project_id', $project->id)->get();
        $serve_datas = BusinessDrive::where('user_id', $id)->where('project_id', $project->id)->get();
        $partner_datas = WordPartner::where('project_id', $project->id)->get();
        $effectiveness_datas = WordEffectiveness::where('user_id', $id)->where('project_id', $project->id)->get();
        $serve_datas = WordServe::where('user_id', $id)->where('project_id', $project->id)->get();
        $word_question_datas = WordQuestion::where('project_id', $project->id)->get();
        $check_datas = WordCheck::where('user_id', $id)->where('project_id', $project->id)->get();
        $serve_datas = WordServe::where('user_id', $id)->where('project_id', $project->id)->get();
        $drive_datas = BusinessDrive::where('user_id', $id)->where('project_id', $project->id)->get();
        $personnel_datas = ProjectPersonnel::where('project_id', $project->id)->get();
        $planned_datas = WordPlanned::where('user_id', $id)->where('project_id', $project->id)->get();
        $check_datas = WordCheck::where('user_id', $id)->where('project_id', $project->id)->get();
        $effectiveness_datas = WordEffectiveness::where('user_id', $id)->where('project_id', $project->id)->get();


        // 確保 $cust_data 存在
        if (!$cust_data) {
            return response()->json(['error' => '客戶資料未找到'], 404);
        }

        // 創建新的簡報
        $presentation = new PhpPresentation();

        // 設定幻燈片大小為16:9
        $presentation->getLayout()->setDocumentLayout(\PhpOffice\PhpPresentation\DocumentLayout::LAYOUT_SCREEN_16X9, true);

        // 添加一個幻燈片
        $slide = $presentation->getActiveSlide();

        $shapeBlueBar = $slide->createRichTextShape();
        $shapeBlueBar->setWidth(150) // 設置寬度
            ->setHeight(720) // 設置高度
            ->setOffsetX(0)  // 設置 X 軸偏移
            ->setOffsetY(0); // 設置 Y 軸偏移

        // 設置填充色為藍色
        $shapeBlueBar->getFill()->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('FF5B9BD5'));

        // 設置邊框為無邊框
        $shapeBlueBar->getBorder()->setLineStyle(Border::LINE_NONE);
        // 添加主標題
        $shapeTitle = $slide->createRichTextShape()
            ->setHeight(100)
            ->setWidth(700)
            ->setOffsetX(180)
            ->setOffsetY(180);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun($word_data->project_name);
        $textRunTitle->getFont()->setBold(true)->setSize(32)->setColor(new Color('FF000000'));

        // 添加小標題
        $shapeSubtitle = $slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(300)
            ->setOffsetX(180)
            ->setOffsetY(130);
        $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunSubtitle = $shapeSubtitle->createTextRun('整合應用服務類');
        $textRunSubtitle->getFont()->setBold(true)->setSize(18)->setColor(new Color('FF5B9BD5'));

        // 添加提案單位及簡報人信息
        $shapeInfo = $slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(600)
            ->setOffsetX(180)
            ->setOffsetY(400);
        $shapeInfo->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $shapeInfo->createTextRun('提案單位：' . $user_data->name)->getFont()->setSize(16)->setColor(new Color('FF000000'));
        $shapeInfo->createBreak();
        $shapeInfo->createTextRun('簡報人：' . $project_host_data->name)->getFont()->setSize(16)->setColor(new Color('FF000000'));
        $shapeInfo->createBreak();
        $shapeInfo->createTextRun('簡報日期：2024年XX月XX日')->getFont()->setSize(16)->setColor(new Color('FF000000'));

        // 添加一個幻燈片
        $slide2 = $presentation->createSlide();
        // 添加標題
        $shapeTitle = $slide2->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('公司介紹 - 品牌故事');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 添加公司介紹文本 (這部分會從資料庫提取)
        $companyDescription = $word_data->introduction; // 假設這裡是資料庫提取的描述文字

        $shapeText = $slide2->createRichTextShape()
            ->setHeight(400)
            ->setWidth(500)
            ->setOffsetX(50)
            ->setOffsetY(80);
        $shapeText->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // 添加從資料庫提取的普通文本
        $textRun = $shapeText->createTextRun($companyDescription);
        $textRun->getFont()->setSize(18)->setColor(new Color('FF000000'));

        // 創建第三張幻燈片
        $slide3 = $presentation->createSlide();

        // 添加標題 "目錄"
        $shapeTitle = $slide3->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('目錄');
        $textRunTitle->getFont()->setBold(true)->setSize(32)->setColor(new Color('FF0070C0'));

        // 第一列目錄項目
        $shapeLeftColumn = $slide3->createRichTextShape()
            ->setHeight(400)
            ->setWidth(500)
            ->setOffsetX(50)
            ->setOffsetY(100);
        $shapeLeftColumn->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // 左邊目錄項目
        $itemsLeft = [
            '壹 · 書面審查委員意見表',
            '貳 · 計畫摘要',
            '參 · 智慧減碳應用服務模式',
            '肆 · 智慧應用服務',
            '伍 · 帶動企業說明及擴散做法'
        ];

        foreach ($itemsLeft as $item) {
            $shapeLeftColumn->createTextRun($item)->getFont()->setSize(20)->setColor(new Color('FF000000'));
            // 手動增加行高，這裡使用兩次換行來模擬行距
            $shapeLeftColumn->createBreak();
            $shapeLeftColumn->createBreak();
        }

        // 第二列目錄項目
        $shapeRightColumn = $slide3->createRichTextShape()
            ->setHeight(400)
            ->setWidth(500)
            ->setOffsetX(500)
            ->setOffsetY(100);
        $shapeRightColumn->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // 右邊目錄項目
        $itemsRight = [
            '陸 · 計畫團隊組成與分工說明',
            '柒 · 執行時程及預定查核點說明',
            '捌 · 預期效益',
            '玖 · 預算說明',
            '拾 · 總表'
        ];

        foreach ($itemsRight as $item) {
            $shapeRightColumn->createTextRun($item)->getFont()->setSize(20)->setColor(new Color('FF000000'));
            // 手動增加行高，這裡使用兩次換行來模擬行距
            $shapeRightColumn->createBreak();
            $shapeRightColumn->createBreak();
        }

        // 創建第四張幻燈片
        $slide4 = $presentation->createSlide();

        // 添加標題 "壹、書面審查委員意見表"
        $shapeTitle = $slide4->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('壹、書面審查委員意見表');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建無邊框表格
        $table = $slide4->createTableShape(4); // 4 列
        $table->setHeight(200); // 表格高度
        $table->setWidth(1200); // 表格總寬度
        $table->setOffsetX(50); // X 偏移
        $table->setOffsetY(100); // Y 偏移
        $table->getBorder()->setLineStyle(Border::LINE_NONE); // 設置無邊框

        // 添加表頭
        $row = $table->createRow();

        // 第一個單元格 (項次)
        $cell1 = $row->getCell(0);
        $cell1->setWidth(80);  // 設置寬度
        $cell1->createTextRun('項次')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $cell1->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF0070C0')); // 背景色設置
        // 設置段落居中 (水平居中)
        $cell1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // 設置單元格無邊框
        // $cell1->getBorders()->getBottom()->setLineStyle(\PhpOffice\PhpPresentation\Style\Border::LINE_NONE);
        // $cell1->getBorders()->getTop()->setLineStyle(\PhpOffice\PhpPresentation\Style\Border::LINE_NONE);
        // $cell1->getBorders()->getLeft()->setLineStyle(\PhpOffice\PhpPresentation\Style\Border::LINE_NONE);
        // $cell1->getBorders()->getRight()->setLineStyle(\PhpOffice\PhpPresentation\Style\Border::LINE_NONE);

        // 第二個單元格 (審查意見)
        $cell2 = $row->getCell(1);
        $cell2->setWidth(250);  // 設置寬度
        $cell2->createTextRun('審查意見')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $cell2->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF0070C0'));
        $cell2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // 設置文字居中
        $cell2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER); // 設置垂直居中

        // 第三個單元格 (提案企業回覆)
        $cell3 = $row->getCell(2);
        $cell3->setWidth(350);  // 設置寬度
        $cell3->createTextRun('提案企業回覆')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $cell3->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF0070C0'));
        $cell3->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // 設置文字居中
        $cell3->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER); // 設置垂直居中

        // 第四個單元格 (修正頁碼)
        $cell4 = $row->getCell(3);
        $cell4->setWidth(150);  // 設置寬度
        $cell4->createTextRun('修正頁碼')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $cell4->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF0070C0'));
        $cell4->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // 設置文字居中
        $cell4->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER); // 設置垂直居2

        // 添加空白行
        $emptyRow = $table->createRow();
        $emptyRow->getCell(0)->setWidth(80);  // 第一列空白單元格
        $emptyRow->getCell(1)->setWidth(250); // 第二列空白單元格
        $emptyRow->getCell(2)->setWidth(350); // 第三列空白單元格
        $emptyRow->getCell(3)->setWidth(150); // 第四列空白單元格

        // 創建第五張幻燈片
        $slide5 = $presentation->createSlide();

        // 添加標題 "計畫摘要 - 企業面臨之問題"
        $shapeTitle = $slide5->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('貳、計畫摘要 - 企業面臨之問題');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建無邊框表格
        $table = $slide5->createTableShape(3); // 3 列，一列放圖，一列放問題
        $table->setHeight(400); // 表格高度
        $table->setWidth(700);  // 表格寬度
        $table->setOffsetX(50); // X 偏移
        $table->setOffsetY(100); // Y 偏移
        $table->getBorder()->setLineStyle(Border::LINE_NONE); // 無邊框

        // 遍歷 $word_questions 數組並生成行
        foreach ($word_questions as $key => $question) {
            $row = $table->createRow();

            $textCel0 = $row->getCell(0);
            $textCel0->setWidth(150);  // 設置寬度
            $textRun = $textCel0->createTextRun('');
            $textRun->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $textCel0->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textCel0->createBreak();

            $textCel1 = $row->getCell(1);
            $textCel1->setWidth(150);  // 設置寬度
            $textRun = $textCel1->createTextRun($word_plans[$key]['reduction_item']);
            $textRun->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $textCel1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textCel1->createBreak();

            $textCel2 = $row->getCell(2);
            $textCel2->setWidth(500);  // 設置寬度
            $textRun = $textCel2->createTextRun($question->question);
            $textRun->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $textCel2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textCel2->createBreak();
        }

        // 創建第六張幻燈片
        $slide6 = $presentation->createSlide();

        // 添加標題 "貳、計畫摘要"
        $shapeTitle = $slide6->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('貳、計畫摘要');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 第一個表格："基本資料"
        $table1 = $slide6->createTableShape(1); // 一列
        $table1->setHeight(200);
        $table1->setWidth(420);
        $table1->setOffsetX(50);
        $table1->setOffsetY(80);

        // 第一行 - 藍底白字
        $row1 = $table1->createRow();
        $cellBasicTitle = $row1->getCell(0);
        $cellBasicTitle->setWidth(420);
        $cellBasicTitle->createTextRun('基本資料')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellBasicTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二行 - 內容
        $row2 = $table1->createRow();
        $cellBasicInfo = $row2->getCell(0);
        $cellBasicInfo->setWidth(500);
        $cellBasicInfo->createTextRun("● 產業別：" . $word_data->industry_category . "\n● 資本額/營業額：XXXX 千元 /" . number_format($cust_data->last_year_revenue) . "千元\n● 員工人數：" . $cust_data->insurance_total . "人\n● 提案補助款/提案自籌款：" . number_format($word_data->subsidy) . "千元 / " . number_format($word_data->self_funding) . " 千元")->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第二個表格："帶動企業"
        $table2 = $slide6->createTableShape(1); // 一列
        $table2->setHeight(200);
        $table2->setWidth(300);
        $table2->setOffsetX(550);
        $table2->setOffsetY(80);

        // 第一行 - 藍底白字
        $row3 = $table2->createRow();
        $cellDriveTitle = $row3->getCell(0);
        $cellDriveTitle->setWidth(300);
        $cellDriveTitle->createTextRun('帶動企業')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二行 - 內容
        $row4 = $table2->createRow();
        $cellDriveCompanies = $row4->getCell(0);
        $cellDriveCompanies->setWidth(700);

        // 添加帶動企業的列表
        foreach ($drive_datas as $drive_data) {
            $cellDriveCompanies->createTextRun("● " . $drive_data['name'])->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $cellDriveCompanies->createBreak(); // 分行顯示
        }

        // 第三個表格："委託單位及合作內容說明"
        $table3 = $slide6->createTableShape(1); // 一列
        $table3->setHeight(200);
        $table3->setWidth(820);
        $table3->setOffsetX(50);
        $table3->setOffsetY(320);

        // 第一行 - 藍底白字
        $row5 = $table3->createRow();
        $cellPartnerTitle = $row5->getCell(0);
        $cellPartnerTitle->setWidth(820);
        $cellPartnerTitle->createTextRun('委託單位及合作內容說明')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellPartnerTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二行 - 內容
        $row6 = $table3->createRow();
        $cellPartnerInfo = $row6->getCell(0);
        $cellPartnerInfo->setWidth(700);

        // 添加委託單位及合作內容的列表
        foreach ($partner_datas as $partner) {
            $cellPartnerInfo->createTextRun("● " . $partner['name'] . "（合作內容：" . $partner['job_content'] . "）")
                ->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $cellPartnerInfo->createBreak(); // 分行顯示
        }

        // 創建第七張幻燈片
        $slide7 = $presentation->createSlide();

        // 添加標題 "貳、計畫摘要"
        $shapeTitle = $slide7->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('貳、計畫摘要');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table = $slide7->createTableShape(2); // 兩列的表格
        $table->setHeight(200);
        $table->setWidth(700);
        $table->setOffsetX(50);
        $table->setOffsetY(100);

        // 第一行：標題行
        $row1 = $table->createRow();

        // 第一列標題
        $cellTask = $row1->getCell(0);
        $cellTask->setWidth(150);
        $cellTask->createTextRun('工作項目')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellTask->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列標題
        $cellDescription = $row1->getCell(1);
        $cellDescription->setWidth(550);
        $cellDescription->createTextRun('說明')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDescription->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 動態添加四行的數據
        for ($i = 0; $i < 4; $i++) {
            $row = $table->createRow();

            // 第一列：手動設定的內容
            $cell1 = $row->getCell(0);
            $cell1->setWidth(150);
            $cell1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT); // 設置左對齊

            switch ($i) {
                case 0:
                    $cell1Text = '1 導入 ' . $check_datas[0]['estimated'] . ' 項智慧減碳應用服務';
                    break;
                case 1:
                    $cell1Text = '2 降低碳排放量 ' . $check_datas[1]['estimated'] . ' 噸';
                    break;
                case 2:
                    $cell1Text = '3 帶動至少 ' . $check_datas[2]['estimated'] . ' 家企業';
                    break;
                case 3:
                    $cell1Text = '4 系統體驗人次預估可增加 ' . $check_datas[3]['estimated'] . ' 人次';
                    break;
            }
            $cell1->createTextRun($cell1Text)->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 第二列：說明內容
            $cell2 = $row->getCell(1);
            $cell2->setWidth(550);
            $cell2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT); // 設置左對齊

            switch ($i) {
                case 0:
                    $cell2Text = '新增「' . $word_plans[0]['name'] . '」與「' . $word_plans[1]['name'] . '」之服務。';
                    break;
                case 1:
                    $cell2Text = '帶動五家企業：';
                    foreach ($drive_datas as $drive_data) {
                        $cell2Text .= $drive_data['name'] . '、';
                    }
                    $cell2Text = rtrim($cell2Text, '、'); // 去掉最後一個逗號
                    break;
                case 2:
                    $cell2Text = '導入「' . $word_plans[0]['name'] . '」與「' . $word_plans[1]['name'] . '」後，期望達到的體驗人次。';
                    break;
                case 3:
                    $cell2->createTextRun('1. 因導入「' . $word_plans[0]['name'] . '」所減少原料報廢')->getFont()->setSize(14)->setColor(new Color('FF000000'));
                    $cell2->createBreak();
                    $cell2->createTextRun('2. 因導入「' . $word_plans[1]['name'] . '」所減少的運輸碳排放')->getFont()->setSize(14)->setColor(new Color('FF000000'));
            }

            if ($i != 3) {
                $cell2->createTextRun($cell2Text)->getFont()->setSize(14)->setColor(new Color('FF000000'));
            }
        }

        // 接著創建第八張幻燈片
        $slide8 = $presentation->createSlide();


        // 添加標題 "問題大類一"
        $shapeTitle = $slide8->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('參、智慧減碳應用服務模式');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table8 = $slide8->createTableShape(2); // 表格有兩列
        $table8->setHeight(300);
        $table8->setWidth(700);
        $table8->setOffsetX(50);
        $table8->setOffsetY(100);

        // 第一行：問題大類
        $slide8_row1 = $table8->createRow();
        $cellProblemTitle = $slide8_row1->getCell(0);
        $cellProblemTitle->setWidth(150);
        $cellProblemTitle->createTextRun('問題大類一')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellProblemTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellProblemContent = $slide8_row1->getCell(1);
        $cellProblemContent->setWidth(550);
        $cellProblemContent->createTextRun($word_question_datas[0]['question'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第二行：導入解方
        $slide8_row2 = $table8->createRow();
        $cellSolutionTitle = $slide8_row2->getCell(0);
        $cellSolutionTitle->setWidth(150);
        $cellSolutionTitle->createTextRun('導入解方')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellSolutionTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellSolutionContent = $slide8_row2->getCell(1);
        $cellSolutionContent->setWidth(550);
        $cellSolutionContent->createTextRun($word_question_datas[0]['illustrate'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 接著創建第九張幻燈片
        $slide9 = $presentation->createSlide();

        // 添加標題 "問題大類一"
        $shapeTitle = $slide9->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('參、智慧減碳應用服務模式');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table8 = $slide9->createTableShape(2); // 表格有兩列
        $table8->setHeight(300);
        $table8->setWidth(700);
        $table8->setOffsetX(50);
        $table8->setOffsetY(100);

        // 第一行：問題大類
        $slide9_row1 = $table8->createRow();
        $cellProblemTitle = $slide9_row1->getCell(0);
        $cellProblemTitle->setWidth(150);
        $cellProblemTitle->createTextRun('問題大類一')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellProblemTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellProblemContent = $slide9_row1->getCell(1);
        $cellProblemContent->setWidth(550);
        $cellProblemContent->createTextRun($word_question_datas[0]['question'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第二行：導入解方
        $slide9_row2 = $table8->createRow();
        $cellSolutionTitle = $slide9_row2->getCell(0);
        $cellSolutionTitle->setWidth(150);
        $cellSolutionTitle->createTextRun('導入解方')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellSolutionTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellSolutionContent = $slide9_row2->getCell(1);
        $cellSolutionContent->setWidth(550);
        $cellSolutionContent->createTextRun($word_question_datas[0]['illustrate'])->getFont()->setSize(14)->setColor(new Color('FF000000'));


        // 接著創建第十張幻燈片
        $slide10 = $presentation->createSlide();

        // 添加標題 "問題大類一"
        $shapeTitle = $slide10->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('參、智慧減碳應用服務模式');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table8 = $slide10->createTableShape(2); // 表格有兩列
        $table8->setHeight(300);
        $table8->setWidth(700);
        $table8->setOffsetX(50);
        $table8->setOffsetY(100);

        // 第一行：問題大類
        $slide10_row1 = $table8->createRow();
        $cellProblemTitle = $slide10_row1->getCell(0);
        $cellProblemTitle->setWidth(150);
        $cellProblemTitle->createTextRun('問題大類二')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellProblemTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellProblemContent = $slide10_row1->getCell(1);
        $cellProblemContent->setWidth(550);
        $cellProblemContent->createTextRun($word_question_datas[1]['question'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第二行：導入解方
        $slide10_row2 = $table8->createRow();
        $cellSolutionTitle = $slide10_row2->getCell(0);
        $cellSolutionTitle->setWidth(150);
        $cellSolutionTitle->createTextRun('導入解方')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellSolutionTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellSolutionContent = $slide10_row2->getCell(1);
        $cellSolutionContent->setWidth(550);
        $cellSolutionContent->createTextRun($word_question_datas[1]['illustrate'])->getFont()->setSize(14)->setColor(new Color('FF000000'));


        // 接著創建第十一張幻燈片
        $slide10 = $presentation->createSlide();

        // 添加標題 "問題大類一"
        $shapeTitle = $slide10->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('參、智慧減碳應用服務模式');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table8 = $slide10->createTableShape(2); // 表格有兩列
        $table8->setHeight(300);
        $table8->setWidth(700);
        $table8->setOffsetX(50);
        $table8->setOffsetY(100);

        // 第一行：問題大類
        $slide10_row1 = $table8->createRow();
        $cellProblemTitle = $slide10_row1->getCell(0);
        $cellProblemTitle->setWidth(150);
        $cellProblemTitle->createTextRun('問題大類二')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellProblemTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellProblemContent = $slide10_row1->getCell(1);
        $cellProblemContent->setWidth(550);
        $cellProblemContent->createTextRun($word_question_datas[1]['question'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第二行：導入解方
        $slide10_row2 = $table8->createRow();
        $cellSolutionTitle = $slide10_row2->getCell(0);
        $cellSolutionTitle->setWidth(150);
        $cellSolutionTitle->createTextRun('導入解方')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellSolutionTitle->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        $cellSolutionContent = $slide10_row2->getCell(1);
        $cellSolutionContent->setWidth(550);
        $cellSolutionContent->createTextRun($word_question_datas[1]['illustrate'])->getFont()->setSize(14)->setColor(new Color('FF000000'));


        // 創建第十二張幻燈片
        $slide12 = $presentation->createSlide();

        // 添加標題 "肆、智慧應用服務"
        $shapeTitle = $slide12->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('肆、智慧應用服務');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table = $slide12->createTableShape(4); // 四列的表格
        $table->setHeight(200);
        $table->setWidth(700);
        $table->setOffsetX(50);
        $table->setOffsetY(100);

        // 第一行：標題行
        $row1 = $table->createRow();

        // 第一列標題
        $cellPlanName = $row1->getCell(0);
        $cellPlanName->setWidth(150);
        $cellPlanName->createTextRun('智慧應用方案項目名稱')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellPlanName->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列標題
        $cellFunctionDescription = $row1->getCell(1);
        $cellFunctionDescription->setWidth(300);
        $cellFunctionDescription->createTextRun('功能說明')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellFunctionDescription->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第三列標題
        $cellCarbonReduction = $row1->getCell(2);
        $cellCarbonReduction->setWidth(150);
        $cellCarbonReduction->createTextRun('預計應用之減碳項目')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellCarbonReduction->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第四列標題
        $cellExecutionMethod = $row1->getCell(3);
        $cellExecutionMethod->setWidth(100);
        $cellExecutionMethod->createTextRun('執行方式')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellExecutionMethod->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 動態添加數據
        foreach ($word_plans as $plan) {
            $row = $table->createRow();

            // 智慧應用方案項目名稱
            $cell1 = $row->getCell(0);
            $cell1->setWidth(150);
            $cell1->createTextRun($plan['name'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 功能說明
            $cell2 = $row->getCell(1);
            $cell2->setWidth(300);
            $cell2->createTextRun($plan['description'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 預計應用之減碳項目
            $cell3 = $row->getCell(2);
            $cell3->setWidth(150);
            $cell3->createTextRun($plan['reduction_item'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 執行方式
            $cell4 = $row->getCell(3);
            $cell4->setWidth(100);
            $cell4->createTextRun($plan['method'])->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }

        // 創建第十三張幻燈片
        $slide13 = $presentation->createSlide();

        // 添加標題 "伍、帶動企業說明及擴散做法"
        $shapeTitle = $slide13->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('伍、帶動企業說明及擴散做法');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        $shapeSubTitle = $slide13->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(70);
        $shapeSubTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeSubTitle->createTextRun('一、帶動企業名單及與堤案企業之關聯性：');
        $textRunTitle->getFont()->setBold(true)->setSize(14)->setColor(new Color('FF000000'));

        // 創建表格
        $table = $slide13->createTableShape(7); // 四列的表格
        $table->setHeight(200);
        $table->setWidth(700);
        $table->setOffsetX(50);
        $table->setOffsetY(100);

        // 第一行：標題行
        $row1 = $table->createRow();

        // 第一列標題
        $cellDriveName = $row1->getCell(0);
        $cellDriveName->setWidth(150);
        $cellDriveName->createTextRun('企業名稱')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveName->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列標題
        $cellDriveType = $row1->getCell(1);
        $cellDriveType->setWidth(180);
        $cellDriveType->createTextRun('與提案單位之關係')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveType->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第三列標題
        $cellApplicationSolution = $row1->getCell(2);
        $cellApplicationSolution->setWidth(150);
        $cellApplicationSolution->createTextRun('導入或運用之智慧應用方案')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellApplicationSolution->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第四列標題
        $cellDriveIndustry = $row1->getCell(3);
        $cellDriveIndustry->setWidth(100);
        $cellDriveIndustry->createTextRun('產業別')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveIndustry->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第五列標題
        $cellDriveCity = $row1->getCell(4);
        $cellDriveCity->setWidth(90);
        $cellDriveCity->createTextRun('縣市別')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveCity->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第六列標題
        $cellDriveEmployee = $row1->getCell(5);
        $cellDriveEmployee->setWidth(90);
        $cellDriveEmployee->createTextRun('員工數')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveEmployee->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第七列標題
        $cellDriveNumber = $row1->getCell(6);
        $cellDriveNumber->setWidth(90);
        $cellDriveNumber->createTextRun('統一編號')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellDriveNumber->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 動態添加數據
        foreach ($drive_datas as $drive_data) {
            $row = $table->createRow();

            // 智慧應用方案項目名稱
            $cell1 = $row->getCell(0);
            $cell1->setWidth(150);
            $cell1->createTextRun($drive_data['name'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 功能說明
            $cell2 = $row->getCell(1);
            $cell2->setWidth(300);
            $type = '';
            if ($drive_data->type == '0') {
                $type = "上游";
            } else if ($drive_data->type == '1') {
                $type = "下游";
            } else if ($drive_data->type == '2') {
                $type = "合作";
            } else {
                $type = "店家";
            }
            $cell2->createTextRun("主提案商之" . $type)->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 預計應用之減碳項目
            $cell3 = $row->getCell(2);
            $cell3->setWidth(170);
            $cell3->createTextRun($word_data->application_solution)->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 執行方式
            $cell4 = $row->getCell(3);
            $cell4->setWidth(80);
            $cell4->createTextRun(isset($drive_data['industry']) ? (string)$drive_data['industry'] : '')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 執行方式
            $cell5 = $row->getCell(4);
            $cell5->setWidth(90);
            $cell5->createTextRun(isset($drive_data['city']) ? (string)$drive_data['city'] : '')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 執行方式
            $cell6 = $row->getCell(5);
            $cell6->setWidth(90);
            $cell6->createTextRun($drive_data['employeecount'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 執行方式
            $cell7 = $row->getCell(6);
            $cell7->setWidth(90);
            $cell7->createTextRun($drive_data['numbers'])->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }

        // 創建第十四張幻燈片
        $slide14 = $presentation->createSlide();

        // 添加標題 "伍、帶動企業說明及擴散做法"
        $shapeTitle = $slide14->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('伍、帶動企業說明及擴散做法');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        $shapeSubTitle = $slide14->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(70);
        $shapeSubTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeSubTitle->createTextRun('二、服務擴散及維運做法：');
        $textRunTitle->getFont()->setBold(true)->setSize(14)->setColor(new Color('FF000000'));

        // 創建表格
        $table = $slide14->createTableShape(2);
        $table->setHeight(200);
        $table->setWidth(700);
        $table->setOffsetX(50);
        $table->setOffsetY(100);

        // 第一行：標題行
        $row1 = $table->createRow();

        // 第一列標題
        $cellServeItem = $row1->getCell(0);
        $cellServeItem->setWidth(150);
        $cellServeItem->createTextRun('項目')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellServeItem->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列標題
        $cellServeContext = $row1->getCell(1);
        $cellServeContext->setWidth(480);
        $cellServeContext->createTextRun('說明')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellServeContext->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        // 動態添加數據
        foreach ($serve_datas as $serve_data) {
            $row = $table->createRow();

            // 智慧應用方案項目名稱
            $cell1 = $row->getCell(0);
            $cell1->setWidth(150);
            $cell1->createTextRun($serve_data['item'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 功能說明
            $cell2 = $row->getCell(1);
            $cell2->setWidth(480);
            $cell2->createTextRun($serve_data['context'])->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }

        // 創建第十五張幻燈片
        $slide15 = $presentation->createSlide();

        $shapeTitle = $slide15->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('陸、計畫團隊組成與分工說明');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建第十六張幻燈片
        $slide16 = $presentation->createSlide();

        $shapeTitle = $slide16->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('陸、計畫團隊組成與分工說明');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 創建表格
        $table16 = $slide16->createTableShape(4); // 四列的表格
        $table16->setHeight(200);
        $table16->setWidth(700);
        $table16->setOffsetX(50);
        $table16->setOffsetY(100);

        // 第一行：標題行
        $row1 = $table16->createRow();

        // 第一列標題
        $cellCompanyName = $row1->getCell(0);
        $cellCompanyName->setWidth(250);
        $cellCompanyName->createTextRun('企業名稱或姓名')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellCompanyName->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列標題
        $cellJob = $row1->getCell(1);
        $cellJob->setWidth(200);
        $cellJob->createTextRun('本計畫擔任職務')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellJob->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第三列標題
        $cellTask = $row1->getCell(2);
        $cellTask->setWidth(150);
        $cellTask->createTextRun('主要工作項目')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellTask->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第四列標題
        $cellManMonth = $row1->getCell(3);
        $cellManMonth->setWidth(100);
        $cellManMonth->createTextRun('職稱/投入人月')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellManMonth->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二行和第三行：手動新增的數據
        $row2 = $table16->createRow();
        $cell2_1 = $row2->getCell(0);
        $cell2_1->createTextRun($user_data->name . '/' . $project_host_data->name)->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell2_2 = $row2->getCell(1);
        $cell2_2->createTextRun('計畫主持人')->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell2_3 = $row2->getCell(2);
        $cell2_3->createTextRun('計畫主持人及所有進度掌握控管')->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell2_4 = $row2->getCell(3);
        $cell2_4->createTextRun($project_host_data->job . '/' . $project_host_data->month)->getFont()->setSize(14)->setColor(new Color('FF000000'));

        $row3 = $table16->createRow();
        $cell3_1 = $row3->getCell(0);
        $cell3_1->createTextRun($user_data->name . '/' . $project_contact_data->name)->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell3_2 = $row3->getCell(1);
        $cell3_2->createTextRun('計畫聯絡人')->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell3_3 = $row3->getCell(2);
        $cell3_3->createTextRun('委外廠商溝通協調、改善進度控管')->getFont()->setSize(14)->setColor(new Color('FF000000'));
        $cell3_4 = $row3->getCell(3);
        $cell3_4->createTextRun($project_contact_data->job . '/' . $project_contact_data->month)->getFont()->setSize(14)->setColor(new Color('FF000000'));

        // 第四行到第七行：動態生成 personnel_datas
        foreach ($personnel_datas as $person) {
            $row = $table16->createRow();

            $cell1 = $row->getCell(0);
            $cell1->createTextRun($user_data->name . '/' . $person['name'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell2 = $row->getCell(1);
            $cell2->createTextRun('提案企業執行人力')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell3 = $row->getCell(2);
            $cell3->createTextRun(isset($person['context']) ? (string)$person['context'] : '')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell4 = $row->getCell(3);
            $cell4->createTextRun($person['job'] . '/' . $person['month'])->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }

        // 最後兩行：動態生成 partner_datas
        foreach ($partner_datas as $partner) {
            $row = $table16->createRow();

            $cell1 = $row->getCell(0);
            $cell1->createTextRun($partner['name'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell2 = $row->getCell(1);
            $cell2->createTextRun('資服業者')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell3 = $row->getCell(2);
            $cell3->createTextRun($partner['job_content'])->getFont()->setSize(14)->setColor(new Color('FF000000'));

            $cell4 = $row->getCell(3);
            $cell4->createTextRun('委外單位窗口不編列人月')->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }

        // 創建第十七張幻燈片
        $slide17 = $presentation->createSlide();

        // 添加標題 "柒、執行時程及預定查核點說明 1/2"
        $shapeTitle = $slide17->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('柒、執行時程及預定查核點說明 1/2');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // 添加副標題 "一、預計完成並導入之時程：113年7/1-12/31"
        // part2.計畫綱要
        $project_start = $word_data->project_start ?? ' ';
        $project_end = $word_data->project_end ?? ' ';
        $roc_project_start = $this->convertToRocDate($project_start);
        $roc_project_end = $this->convertToRocDate($project_end);
        $shapeSubtitle = $slide17->createRichTextShape()
            ->setHeight(30)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(80);
        $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunSubtitle = $shapeSubtitle->createTextRun('一、預計完成並導入之時程：' . $roc_project_start . '至' . $roc_project_end);
        $textRunSubtitle->getFont()->setBold(false)->setSize(18)->setColor(new Color('FF000000'));

        // 創建表格，設置第一行（執行年度）
        $table = $slide17->createTableShape(7); // 表格七列
        $table->setHeight(100);
        $table->setWidth(700);
        $table->setOffsetX(50);
        $table->setOffsetY(120);

        // 第一行：執行年度標題行
        $row1 = $table->createRow();

        // 第一列 - 左側標題「執行年度」
        $cellYear = $row1->getCell(0);
        $cellYear->setWidth(150);
        $cellYear->createTextRun('執行年度')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
        $cellYear->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // 第二列到第七列 - 年份內容 "113年度"
        for ($i = 1; $i <= 6; $i++) {
            $cellYearContent = $row1->getCell($i);
            $cellYearContent->setWidth(100);
            $cellYearContent->createTextRun('113年度')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FFFFFFFF'));
            $cellYearContent->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        }

        // 第二行：月份標題行
        $row2 = $table->createRow();

        // 第一列 - 左側標題「工作項目」
        $cellTask = $row2->getCell(0);
        $cellTask->setWidth(150);
        $cellTask->createTextRun('工作項目')->getFont()->setBold(true)->setSize(16)->setColor(new Color('FF000000'));

        // 第二列到第七列 - 月份標題 "113年7月 - 113年12月"
        $months = ['113年X月', '113年X月', '113年X月', '113年X月', '113年X月', '113年X月'];
        for ($i = 1; $i <= 6; $i++) {
            $cellMonth = $row2->getCell($i);
            $cellMonth->setWidth(100);
            $cellMonth->createTextRun($months[$i - 1])->getFont()->setBold(true)->setSize(16)->setColor(new Color('FF000000'));
        }

        // 第二行及後續行：動態生成數據
        for ($i = 0; $i <= 5; $i++) {
            $row = $table->createRow();

            // 第一列 - 工作項目
            $cellTask = $row->getCell(0);
            $cellTask->setWidth(150);
            $cellTask->createTextRun($planned_datas[$i]['item'] ?? '')->getFont()->setSize(14)->setColor(new Color('FF000000'));

            // 第二列到第七列 - 時間段標記
            for ($j = 1; $j <= 6; $j++) {
                $cellMonthData = $row->getCell($j);
                $cellMonthData->setWidth(100);

                // 這裡依據需要填入月份數據，這裡以簡單的例子為基礎
                if ($i == 1 || $i == 4) {
                    if ($j == 1) {
                        $cellMonthData->createTextRun("")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                    if ($j == 2) {
                        $cellMonthData->createTextRun("A1")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                } elseif ($i == 2 || $i == 5) {
                    if ($j == 3) {
                        $cellMonthData->createTextRun("")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                    if ($j == 4) {
                        $cellMonthData->createTextRun("A2")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                    if ($j == 5) {
                        $cellMonthData->createTextRun("")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                    if ($j == 6) {
                        $cellMonthData->createTextRun("A3")->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
                        $cellMonthData->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
                    }
                }
            }
        }

        // Create the 18th slide
        $slide18 = $presentation->createSlide();

        // Add the title "柒、執行時程及預定查核點說明 2/2"
        $shapeTitle = $slide18->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('柒、執行時程及預定查核點說明');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // Add subtitle
        $shapeSubtitle = $slide18->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(80);
        $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunSubtitle = $shapeSubtitle->createTextRun('二、預定查核點說明：');
        $textRunSubtitle->getFont()->setSize(16)->setColor(new Color('FF000000'));

        // Create table with 5 columns
        $table18 = $slide18->createTableShape(5);
        $table18->setHeight(400);
        $table18->setWidth(850);
        $table18->setOffsetX(50);
        $table18->setOffsetY(150);

        // First row: Table18 headers
        $row1 = $table18->createRow();
        $row1->getCell(0)->createTextRun('查核點編號')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(1)->createTextRun('完成日期')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(1)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(2)->createTextRun('比重%')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(2)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(3)->createTextRun('查核內容')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(3)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(4)->createTextRun('查核資料')->getFont()->setBold(true)->setSize(14)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(4)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // Add data rows manually for demonstration purposes
        $plan_datas = [
            ['A1', '113年X月3X日', '15%', '規劃及導入一項智慧減碳應用服務：' . $word_question_datas[0]['solution'], '系統驗收單'],
            ['A2', '113年X月3X日', '15%', '帶動' . count($drive_datas) . '家企業使用系統期中查核點', '後台結訂單筆數、系統瀏覽人次紀錄'],
            ['A3', '114年X月3X日', '20%', '帶動' . count($drive_datas) . '企業使用系統期末查核點', '後台結訂單筆數、系統瀏覽人次紀錄'],
            ['B1', '113年X月3X日', '15%', '規劃及導入一項智慧減碳應用服務：' . $word_question_datas[1]['solution'], '系統驗收單'],
            ['B2', '113年X月3X日', '15%', '帶動' . count($drive_datas) . '企業使用系統期中查核點', '後台結訂單筆數、系統瀏覽人次紀錄'],
            ['B3', '114年X月3X日', '20%', '帶動' . count($drive_datas) . '企業使用系統期末查核點', '後台結訂單筆數、系統瀏覽人次紀錄']
        ];

        // Loop through the data and fill the rows
        foreach ($plan_datas as $plan_data) {
            $tableRow = $table18->createRow();
            $tableRow->getCell(0)->createTextRun($plan_data[0])->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $tableRow->getCell(1)->createTextRun($plan_data[1])->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $tableRow->getCell(2)->createTextRun($plan_data[2])->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $tableRow->getCell(3)->createTextRun($plan_data[3])->getFont()->setSize(14)->setColor(new Color('FF000000'));
            $tableRow->getCell(4)->createTextRun($plan_data[4])->getFont()->setSize(14)->setColor(new Color('FF000000'));
        }




        // Assuming $effectiveness_datas is fetched from the database
        $effectiveness_datas = WordEffectiveness::where('user_id', $id)->where('project_id', $project->id)->get();
        $reduction_datas = WordReductionItem::where('user_id', $id)->where('project_id', $project->id)->get();
        $benefit_datas = WordBenefit::where('user_id', $id)->where('project_id', $project->id)->get();
        // Count the total number of effectiveness data entries

        // Loop through the data and generate one slide for each entry
        foreach ($effectiveness_datas as $data) {
            // Create a new slide
            $effectiveness_slide = $presentation->createSlide();

            // Add the title, updating the page number dynamically
            $shapeTitle = $effectiveness_slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(50)
                ->setOffsetY(20);
            $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textRunTitle = $shapeTitle->createTextRun('捌、預期效益 - 關鍵績效指標 ');
            $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

            $shapeSubtitle = $effectiveness_slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(50)
                ->setOffsetY(60);
            $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textRunSubtitle = $shapeSubtitle->createTextRun('一、執行成效：');
            $textRunSubtitle->getFont()->setSize(16)->setColor(new Color('FF000000'));

            // Create table for 關鍵績效指標, 預期達成目標, and 指標內涵定義
            $effectiveness_table = $effectiveness_slide->createTableShape(3); // Three columns
            $effectiveness_table->setHeight(400);
            $effectiveness_table->setWidth(850);
            $effectiveness_table->setOffsetX(50);
            $effectiveness_table->setOffsetY(100);

            // First row: Table headers
            $row1 = $effectiveness_table->createRow();
            $row1->getCell(0)->setWidth(150)->createTextRun('關鍵績效指標')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $row1->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $row1->getCell(1)->setWidth(200)->createTextRun('預期達成目標')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $row1->getCell(1)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $row1->getCell(2)->setWidth(500)->createTextRun('指標內涵定義')->getFont()->setBold(true)->setSize(11)->setColor(new Color('FFFFFFFF'));
            $row1->getCell(2)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

            // Second row: Data for 關鍵績效指標, 預期達成目標, and 指標內涵定義
            $row2 = $effectiveness_table->createRow();
            $row2->getCell(0)->createTextRun($data->kpi)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->kpi
            $row2->getCell(1)->createTextRun($data->goal)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->goal
            $row2->getCell(2)->createTextRun($data->definition)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->definition
        }

        foreach ($reduction_datas as $data) {
            // Create a new slide
            $reduction_slide = $presentation->createSlide();

            // Add the title, updating the page number dynamically
            $shapeTitle = $reduction_slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(50)
                ->setOffsetY(20);
            $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textRunTitle = $shapeTitle->createTextRun('捌、預期效益 - 關鍵績效指標 ');
            $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

            $shapeSubtitle = $reduction_slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(50)
                ->setOffsetY(60);
            $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $textRunSubtitle = $shapeSubtitle->createTextRun('二、減碳項目：');
            $textRunSubtitle->getFont()->setSize(16)->setColor(new Color('FF000000'));

            // Create table for 關鍵績效指標, 預期達成目標, and 指標內涵定義
            $reduction_table = $reduction_slide->createTableShape(5); // Three columns
            $reduction_table->setHeight(400);
            $reduction_table->setWidth(850);
            $reduction_table->setOffsetX(50);
            $reduction_table->setOffsetY(100);

            // First row: Table headers
            $reduction_row1 = $reduction_table->createRow();
            $reduction_row1->getCell(0)->setWidth(120)->createTextRun('減碳項目')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $reduction_row1->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $reduction_row1->getCell(1)->setWidth(70)->createTextRun('輔導前')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $reduction_row1->getCell(1)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $reduction_row1->getCell(2)->setWidth(70)->createTextRun('輔導後')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $reduction_row1->getCell(2)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $reduction_row1->getCell(3)->setWidth(70)->createTextRun('輔導前後差異')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $reduction_row1->getCell(3)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
            $reduction_row1->getCell(4)->setWidth(520)->createTextRun('減碳項目與碳排放量之關係')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
            $reduction_row1->getCell(4)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));


            // Second row: Data for 關鍵績效指標, 預期達成目標, and 指標內涵定義
            $reduction_row2 = $reduction_table->createRow();
            $reduction_row2->getCell(0)->createTextRun($data->item)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->kpi
            $reduction_row2->getCell(1)->createTextRun($data->before_guidance)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->goal
            $reduction_row2->getCell(2)->createTextRun($data->after_guidance)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->definition
            $reduction_row2->getCell(3)->createTextRun($data->difference)->getFont()->setSize(12)->setColor(new Color('FF000000')); // From $data->goal
            $reduction_row2->getCell(4)->createTextRun($data->relationship)->getFont()->setSize(11)->setColor(new Color('FF000000')); // From $data->definition
        }

        $result_slide = $presentation->createSlide();

        // Add the title, updating the page number dynamically
        $shapeTitle = $result_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('捌、預期效益 - 關鍵績效指標 ');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        $shapeSubtitle = $result_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(60);
        $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunSubtitle = $shapeSubtitle->createTextRun('三、提案企業與帶動企業之減碳成效：');
        $textRunSubtitle->getFont()->setSize(16)->setColor(new Color('FF000000'));


        $benefit_slide = $presentation->createSlide();

        // Add the title, updating the page number dynamically
        $shapeTitle = $benefit_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('捌、預期效益 - 關鍵績效指標 ');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        $shapeSubtitle = $benefit_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(60);
        $shapeSubtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunSubtitle = $shapeSubtitle->createTextRun('四、其他效益：');
        $textRunSubtitle->getFont()->setSize(16)->setColor(new Color('FF000000'));

        // Create table for three rows of data
        $benefit_table = $benefit_slide->createTableShape(2); // Two columns for "項目" and "效益"
        $benefit_table->setHeight(400);
        $benefit_table->setWidth(850);
        $benefit_table->setOffsetX(50);
        $benefit_table->setOffsetY(100);

        // First row: Table headers
        $row1 = $benefit_table->createRow();
        $row1->getCell(0)->setWidth(150)->createTextRun('項目')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(1)->setWidth(200)->createTextRun('效益')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(1)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // Iterate through $benefit_datas and display the first three rows
        foreach ($benefit_datas as $index => $data) {
            if ($index < 3) { // Only display three rows
                // Create the row and insert data
                $row2 = $benefit_table->createRow();
                $row2->getCell(0)->setWidth(100)->createTextRun($data->item)->getFont()->setSize(12)->setColor(new Color('FF000000'));
                $row2->getCell(1)->setWidth(750)->createTextRun($data->benefit)->getFont()->setSize(12)->setColor(new Color('FF000000'));
            }
        }

        $word_fund = WordFund::where('user_id', $id)->where('project_id', $project->id)->first();
        $pay_slide = $presentation->createSlide();

        // Add the title of the slide
        $shapeTitle = $pay_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $shapeTitle->createTextRun('玖、預算說明')->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // Add the subtitle (e.g., monetary unit)
        $shapeSubtitle = $pay_slide->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(60);
        $shapeSubtitle->createTextRun('金額單位：元')->getFont()->setSize(16)->setColor(new Color('FF000000'));

        // Create table for financial data
        $pay_table = $pay_slide->createTableShape(6); // 6 columns (Account, Subsidy, Self-funding, Total, Percentage, Notes)
        $pay_table->setHeight(400);
        $pay_table->setWidth(850);
        $pay_table->setOffsetX(50);
        $pay_table->setOffsetY(120);

        // Create header row
        $row = $pay_table->createRow();
        $row->getCell(0)->setWidth(150)->createTextRun('會計科目')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->setWidth(150)->createTextRun('補助款')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row->getCell(2)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row->getCell(3)->setWidth(150)->createTextRun('自籌款')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row->getCell(3)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row->getCell(4)->setWidth(150)->createTextRun('合計')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row->getCell(4)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row->getCell(5)->setWidth(150)->createTextRun('備註')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row->getCell(5)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // Adding rows with fund data
        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('1. 人事費')->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_1)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_2)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_3)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark1 ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));

        // Repeat similar rows for the rest of the funds (from fund_5 to fund_46)
        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('2. 消耗性器材及原材料費')->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_5)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_6)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_7)->getFont()->setSize(12)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark2 ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));

        // Similarly, add more rows for other funds and remarks up to fund_46

        // Example for the next row
        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('3. 設備及軟體使用費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_9)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_10)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_11)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark3 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('4.設備維護費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_13)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_14)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_15)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark4 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        // Add a row for "5. 技術移轉費"
        $row = $pay_table->createRow();
        $row->getCell(0)->setWidth(150)->createTextRun('5. 技術移轉費')->getFont()->setBold(true)->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setRowSpan(4); // Merge cells for the main category to span over the next 3 rows

        // Subsection 1: (1) 技術或智慧財產權購買費
        $row->getCell(1)->createTextRun('(1) 技術或智慧財產權購買費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(2)->createTextRun($word_fund->fund_17)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_18)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_19)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark5 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        // Subsection 2: (2) 委託研究費
        $row = $pay_table->createRow();
        $row->getCell(1)->createTextRun('(2) 委託研究費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(2)->createTextRun($word_fund->fund_21)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_22)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_23)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark6 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        // Subsection 3: (3) 委託勞務費
        $row = $pay_table->createRow();
        $row->getCell(1)->createTextRun('(3) 委託勞務費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(2)->createTextRun($word_fund->fund_25)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_26)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_27)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark7 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        
        // Add a row for "小計"
        $row = $pay_table->createRow();
        $row->getCell(1)->createTextRun('小計')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(2)->createTextRun($word_fund->fund_29)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_30)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_31)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark8 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        
        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('6.差旅費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_33)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_34)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_35)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark9 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('7.市場驗證費')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_37)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_38)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_39)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(5)->createTextRun($word_fund->remark10 ?? '')->getFont()->setSize(10)->setColor(new Color('FF000000'));

        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('合計')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_41)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_42)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_43)->getFont()->setSize(10)->setColor(new Color('FF000000'));

        $row = $pay_table->createRow();
        $row->getCell(0)->createTextRun('百分比')->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(0)->setColSpan(2);
        $row->getCell(2)->createTextRun($word_fund->fund_44)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(3)->createTextRun($word_fund->fund_45)->getFont()->setSize(10)->setColor(new Color('FF000000'));
        $row->getCell(4)->createTextRun($word_fund->fund_46)->getFont()->setSize(10)->setColor(new Color('FF000000'));








        // Create 100th slide
        $slide100 = $presentation->createSlide();

        // Add title "柒、執行時程及預定查核點說明 2/2"
        $shapeTitle = $slide100->createRichTextShape()
            ->setHeight(50)
            ->setWidth(700)
            ->setOffsetX(50)
            ->setOffsetY(20);
        $shapeTitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRunTitle = $shapeTitle->createTextRun('拾、總表');
        $textRunTitle->getFont()->setBold(true)->setSize(24)->setColor(new Color('FF0070C0'));

        // Create table
        $table100 = $slide100->createTableShape(6); // 5 columns for the table
        $table100->setHeight(400);
        $table100->setWidth(850);
        $table100->setOffsetX(50);
        $table100->setOffsetY(130);

        // First row for headers
        $row1 = $table100->createRow();
        $row1->getCell(0)->createTextRun('工作項目')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(0)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(1)->createTextRun("全程預計\n完成數")->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(1)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(2)->createTextRun("期中查核點\n(累計完成)")->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(2)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(3)->createTextRun("期末查核點\n(累計完成)")->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(3)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(4)->createTextRun("占比\n(%)")->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(4)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));
        $row1->getCell(5)->createTextRun('查核資料')->getFont()->setBold(true)->setSize(12)->setColor(new Color('FFFFFFFF'));
        $row1->getCell(5)->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FF5B9BD5'));

        // Dynamically add rows from $check_datas
        foreach ($check_datas as $data) {
            $row = $table100->createRow();
            $row->getCell(0)->createTextRun($data->item ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
            $row->getCell(1)->createTextRun($data->estimated ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
            $row->getCell(2)->createTextRun($data->midterm_checkpoint ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
            $row->getCell(3)->createTextRun($data->final_checkpoint ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
            $row->getCell(4)->createTextRun($data->proportion ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
            $row->getCell(5)->createTextRun($data->audit_data ?? '')->getFont()->setSize(12)->setColor(new Color('FF000000'));
        }





        // 清除緩衝區，確保沒有其他輸出
        if (ob_get_contents()) {
            ob_clean();
        }

        // 將 PPTX 文件輸出
        $writer = IOFactory::createWriter($presentation, 'PowerPoint2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
        header('Content-Disposition: attachment; filename="' . $user_data->name . '-簡報.pptx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        // 結束輸出緩衝
        ob_end_flush();
    }

    private function convertToRocDate($date)
    {
        if ($date) {
            $dateObj = new \DateTime($date);
            $gregorianYear = $dateObj->format('Y');
            $monthDay = $dateObj->format('m月d日');

            // Convert to ROC year by subtracting 1911
            $rocYear = $gregorianYear - 1911;

            // Return in the format '民國XXX年XX月XX日'
            return  $rocYear . '年' . $monthDay;
        }
        return null;
    }
}
