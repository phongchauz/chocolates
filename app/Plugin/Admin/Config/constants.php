<?php

$config = array('Constants' => array(
	'Something' => 1234,
	'Foo' => 'Bar',
));

//Format date
const YMD     = 'Y/m/d';
const YMD_HIS = 'Y/m/d H:i:s';

Configure::write('Exception', array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'KpiStandard.KpiStandardExceptionRenderer',
	'log' => true
));

Configure::write('arrayMonthLong', array(
	4 => 'April',
	5 => 'May',
	6 => 'Jun',
	7 => 'July',
	8 => 'August',
	9 => 'September',
	10 => 'October',
	11 => 'November',
	12 => 'December',
	1 => 'January',
	2 => 'February',
	3 => 'March',
));

Configure::write('arrDefaultMonth', array(
	0 	=> array('id' => 1, 'name' => 'January')
	, 1 => array('id' => 2, 'name' => 'February')
	, 2 => array('id' => 3, 'name' => 'March')
	, 3 => array('id' => 4, 'name' => 'April')
	, 4 => array('id' => 5, 'name' => 'May')
	, 5 => array('id' => 6, 'name' => 'Jun')
	, 6 => array('id' => 7, 'name' => 'July')
	, 7 => array('id' => 8, 'name' => 'August')
	, 8 => array('id' => 9, 'name' => 'September')
	, 9 => array('id' => 10, 'name' => 'October')
	, 10=> array('id' => 11, 'name' => 'November')
	, 11=> array('id' => 12, 'name' => 'December')
));

Configure::write('arrayMonthShort', array(
	4 => 'Apr',
	5 => 'May',
	6 => 'Jun',
	7 => 'Jul',
	8 => 'Aug',
	9 => 'Sep',
	10 => 'Oct',
	11 => 'Nov',
	12 => 'Dec',
	1 => 'Jan',
	2 => 'Feb',
	3 => 'Mar'
));



Configure::write('COLOR_TARGET', '#EF4B42');
Configure::write('COLOR_ACTUALS', '#0070C0');
Configure::write('COLOR_TREND', '#000000');

Configure::write('SCORE_GREEN', 95); //rate percent is green (> 95)
Configure::write('SCORE_YELLOW', 90);//rate percent is yellow (> 90)
Configure::write('SCORE_RED', 89);//rate percent is red (<= 90)

Configure::write('ListCategoryId', array(
	'LS'    => 1
, 'IA'  => 2
, 'PN'  => 3
, 'HR'  => 4
, 'PM'  => 5
, 'OP'  => 6
, 'CU'  => 7
));

const DEFAULT_PAGE_SIZE = 5;

//Status
const STATUS_PENDING = 0;
const STATUS_ACTIVE  = 1;
const STATUS_BLOCK   = 2;

Configure::write('STATUS_LIST', array(
	STATUS_PENDING => 'Pending',
	STATUS_ACTIVE => 'Active',
	STATUS_BLOCK => 'Lock'
));

//Status Yes/No
const STATUS_NO  = 0;
const STATUS_YES = 1;

//Project maximum
const PROJECT_MAX = 5;

const ORDER_ASC = 'ASC';
const ORDER_DESC = 'DESC';
//Perspective
const PERSPECTIVE_FINANCIAL        = 1;
const PERSPECTIVE_CUSTOMER         = 2;
const PERSPECTIVE_INTERNAL_PROCESS = 3;
const PERSPECTIVE_LEARNING_GROWTH  = 4;

Configure::write('PERSPECTIVE_LIST', array(
	PERSPECTIVE_FINANCIAL        => 'Finance',
	PERSPECTIVE_CUSTOMER         => 'Customer',
	PERSPECTIVE_INTERNAL_PROCESS => 'Internal Process',
	PERSPECTIVE_LEARNING_GROWTH  => 'Learning & Growth'
));

//Internal & External Factor
const FACTOR_INTERNAL = 1;
const FACTOR_EXTERNAL = 2;

//Admin role
const ADMIN_SYSTEM = 1;
const ADMIN_LBD    = 2;
const ADMIN_CLIENT = 3;
const USER_NORMAL  = 4;

//Module id define
const MODULE_STANDARD = 5;

//Function type
const TYPE_INPUT = 1;//redirect input page
const TYPE_NONE  = 2;//none redirect
const TYPE_ALL   = 3;//redirect export all

//Color for portlet
const PORTLET_BALDRIGE_CLASS = "";
const PORTLET_STRATEGY_CLASS = "blue";

Configure::write(
	'arrColumnProfitImpactEnded'
	, array(
		0    => 'gross_sales'
	, 1  => 'less'
	, 2  => 'direct_material_cost'
	, 3  => 'direct_labor_cost'
	, 4  => 'other_direct_costs'
	, 5  => 'cost_of_goods_sold'
	, 6  => 'advertising'
	, 7  => 'amortization'
	, 8  => 'dad_debts'
	, 9  => 'bank_charges'
	, 10 => 'charitable_contributions'
	, 11 => 'commissions'
	, 12 => 'contract_labor'
	, 13 => 'credit_card_fees'
	, 14 => 'delivery_expenses'
	, 15 => 'depreciation'
	, 16 => 'dues_and_subscriptions'
	, 17 => 'exec_owner_salaries'
	, 18 => 'insurance'
	, 19 => 'interest'
	, 20 => 'maintenance'
	, 21 => 'miscellaneous'
	, 22 => 'office_expenses'
	, 23 => 'operating_supplies'
	, 24 => 'payroll_taxes'
	, 25 => 'permits_and_licenses'
	, 26 => 'postage'
	, 27 => 'professional_fees'
	, 28 => 'property_taxes'
	, 29 => 'rent'
	, 30 => 'repairs'
	, 31 => 'telephone'
	, 32 => 'travel'
	, 33 => 'utilities'
	, 34 => 'wages'
	, 35 => 'other'
	, 36 => 'total_expenses'
	, 37 => 'gain_loss_on_sale_of_assets'
	, 38 => 'interest_income'
	)
);



Configure::write('ARR_EXCEL_FONT', array(
	0 => 'Arial'
, 1 => 'Times New Roman'
));

Configure::write('DEFAULT_EXCEL_FONT_SIZE', 12);

Configure::write('DEFAULT_EXCEL_COLOR_COMPETITOR', array(
	0     => '993366'
, 1   => 'A7D971'
, 2   => 'FAF360'
, 3   => '558ED5'
, 4   => 'E3E3E3'
, 5   => '003300'
, 5   => 'E46C0A'
));

//Scale for Opportunities and Threats - EFE
Configure::write('SCALE_FOR_OPPORTUNITIES_THREATS', array(
	1 => "The company's response to the very low external factors",
	2 => "The company's response to external factors as average",
	3 => "The company's response to external factors above average",
	4 => "The company's response to external factors high"
));

//Scale for Strengths and Weaknesses - IFE
Configure::write('SCALE_FOR_STRENGTHS_WEAKNESSES', array(
	0 => array(
		'strengths' => 'Medium Strong',
		'strengths_scale' => '3',
		'weakness' => 'Weak',
		'weakness_scale' => '1'),
	2 => array(
		'strengths' => 'Strong',
		'strengths_scale' => '4',
		'weakness' => 'Medium Weak',
		'weakness_scale' => '2'),
));

//Type of KPI
const TYPE_STRENGTHS = 1;
const TYPE_WEAKNESSES = 2;
const TYPE_OPPORTUNITY = 3;
const TYPE_THREATS = 4;

// Type Factor
const TYPE_IFE = 1;
const TYPE_EFE = 2;

const EXCEL_BEGIN_ROW = 1;
const PARENT_COLOR = '3ADF00';
const DANGER_COLOR = 'FF0000';

//Scale for Strengths and Weaknesses - IFE
Configure::write('ARR_GOAL_TYPE'
	, array(
		0 => array(
			'id' 			=> 0,
			'name' 			=> 'None',
			'description' 	=> ''
		),1 => array(
			'id' 			=> 1,
			'name' 			=> 'Bigger is better',
			'description' 	=> ''
		), 2 => array(
			'id' 			=> 2,
			'name' 			=> 'Smaller is better',
			'description' 	=> ''
		), 3 => array(
			'id' 			=> 3,
			'name' 			=> 'Good/ Bad',
			'description' 	=> ''
		)
	)
);

const DEFAULT_PASS = '1234567';
//const DEFAULT_PASS = 'c@nl0g1npr0j3ct';

//Module id define
const MODULE_BALDRIGE = 1;
const MODULE_STRATEGY = 2;
const MODULE_BSC      = 3;
const MODULE_LBD      = 4;
const MODULE_KPI      = 5;

Configure::write('ARR_IDP_TYPE'
	, array(
		0 => array(
			'id'    => 0
			, 'name'=> 'Summary'
		),1 => array(
			'id'    => 1
			, 'name'=> 'Main Plan'
		)
	)
);

//Scale for Opportunities and Threats - EFE
Configure::write('FUNCTION_NAME', array(
	0 => "Import Priority of Company",
	1 => "Import Priority of Department",
	2 => "Import Priority of Position",
	3 => "Import Target of Company",
	4 => "Import Target of Department",
	5 => "Import Target of Position",
	6 => "Import Target of Employee",
	7 => "Import Perform of Employee",
	8 => "Import Formula of Department",
	9 => "Import Goal List",
	10 => "Import Employee List",
	11 => "Import Employee of Department",
	12 => "Import Scale of Goal",
));

?>
