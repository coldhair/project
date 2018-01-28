<?php



//注意上一级路径的写法
require_once 'vendor\phpoffice\phpword\bootstrap.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();


$section = $phpWord->addSection( );
// Add first page header 第一页的页眉
$header = $section->createHeader();    
$table = $header->addTable(array('borderBottomSize'=>9));    
$table->addRow();    
$table->addCell(6500)->addText('济南铁路疾病预防控制中心',
array('name' => '宋体', 'size' => 12,NULL,'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT));    
$table->addCell(2500)->addPreserveText('第{PAGE}页，共{NUMPAGES}页',
array('name' => '宋体', 'size' => 12,NULL,'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));//alignment为什么不起作用呢？



$Footer= $section->createFooter();    
$table = $Footer->addTable(array('borderTopSize'=>9));    
$table->addRow();    
$table->addCell(6500)->addText('济南铁路疾病预防控制中心',
array('name' => '宋体', 'size' => 12,NULL,'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT));    
$table->addCell(2500)->addPreserveText('第{PAGE}页，共{NUMPAGES}页',
array('name' => '宋体', 'size' => 12,NULL,'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));//alignment为什么不起作用呢？




/* Note: any element you append to a document must reside inside of a Section. */
/* 注意: 任何元素都在在Section中添加. */
// Adding an empty Section to the document...

$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
//添加默认字体的文字

$section->addText(
    '"Learn from yesterday, <w:br />live for today, <w:br />hope for tomorrow. '
        . 'The important thing is not to stop questioning." '
        . '<w:br />(Albert Einstein爱因斯坦)'
);

/*
 * Note: it's possible to customize font style of the Text element you add in three ways:
 * - inline;
 * - using named font style (new font style object will be implicitly created);
 * - using explicitly created font style object.
 */

// Adding Text element with font customized inline...

$section->addText(
    '"Great <w:br />achievement<w:br /> is <w:br />usually<w:br /> born <w:br />of great sacrifice, '
        . 'and is never the result</w:t><w:br/><w:t> of</w:t><w:br/><w:t> selfishness." '
        . '(Napoleon Hill)',
    array('name' => 'Tahoma', 'size' => 10)
);

// Adding Text element with font customized using named font style...
$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$section->addText(
    '"The greatest accomplishment is not in never falling, '
        . 'but in rising again after you fall." '
        . '(Vince Lombardi)',
    $fontStyleName
);


// 添加了2个回车
$section->addTextBreak(2);


// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(13);
$myTextElement = $section->addText('"我相信你！Believe you can and you\'re halfway there." (Theodor Roosevelt)');
$myTextElement->setFontStyle($fontStyle);

//试试上标与下标
$textrun = $section->addTextRun();
$textrun->addText('E=mc');
$textrun->addText('2', array('superScript' => true));
$section->addTextBreak(2);

echo '第一页写完了';



$textrun = $section->addTextRun();
$textrun->addText('I am inline styled ', $fontStyle);
$textrun->addText('with ');
$textrun->addText('color', array('color' => '996699'));
$textrun->addText(', ');
$textrun->addText('bold', array('bold' => true));
$textrun->addText(', ');
$textrun->addText('italic', array('italic' => true));
$textrun->addText(', ');
$textrun->addText('underline', array('underline' => 'dash'));
$textrun->addText(', ');
$textrun->addText('strikethrough', array('strikethrough' => true));
$textrun->addText(', ');
$textrun->addText('doubleStrikethrough', array('doubleStrikethrough' => true));
$textrun->addText(', ');
$textrun->addText('superScript', array('superScript' => true));
$textrun->addText(', ');
$textrun->addText('subScript', array('subScript' => true));
$textrun->addText(', ');
$textrun->addText('smallCaps', array('smallCaps' => true));
$textrun->addText(', ');
$textrun->addText('allCaps', array('allCaps' => true));
$textrun->addText(', ');
$textrun->addText('fgColor', array('fgColor' => 'yellow'));
$textrun->addText(', ');
$textrun->addText('scale', array('scale' => 200));
$textrun->addText(', ');
$textrun->addText('spacing', array('spacing' => 120));
$textrun->addText(', ');
$textrun->addText('kerning', array('kerning' => 10));
$textrun->addText('. ');

//网页标记的转换
$section = $phpWord->addSection();


$html = '<h1>Adding element via HTML</h1>';


$html .= '<p>Some well formed HTML snippet needs to be used</p>';

//下面这一行的标签都是支持的,但<br/>标签不能解析成回车换行。
$html .= '<p>With for example <strong>some<sup>1</sup> <em>inline</em> formatting</strong><sub>1</sub></p>';


$html .= '<p>Unor<br/>dered (bulleted) list:</p>';
$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
$html .= '<p>Ordered (numbered) list:</p>';
$html .= '<ol><li>Item 1</li><li>Item 2</li></ol>';

$html .= '<p>List with complex content:</p>';
$html .= '<ul>
                <li>
                    <span style="font-family: arial,helvetica,sans-serif;">
                        <span style="font-size: 12px;">list item1</span>
                    </span>
                </li>
                <li>
                    <span style="font-family: arial,helvetica,sans-serif;">
                        <span style="font-size: 100px;">list item2</span>
                    </span>
                </li>
            </ul>';

			//表格的属性如下

$html .= '<table style="width: 100%; border-width: 12px;">
				<caption>我的标题</caption>
                <thead>
                    <tr style="text-align: center; font-weight: bold; ">
                        <th>高高</th>
                        <th>header b</th>
                        <th>header c</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
					 <tr><td style="border-style: dotted;">1</td><td colspan="2">2</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td></tr>
                </tbody>
            </table>';

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);


// Saving the document as OOXML file...保存文件
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

$objWriter->save('helloWorld.docx');

echo '文件已经生成';