@extends('layout.master')

<?php
		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');
?>

@section('meta_detail')
        <title>{{$landingpageseo->$meta_var }}</title>
        <meta name="description" content="{{$landingpageseo->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$landingpageseo->$meta_keywords_var}} "/>
@endsection

<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $uri_segments = explode('/', $uri_path);
    $seg1 = $uri_segments[1];
    if($seg1 == 'en' || $seg1 == 'ar' || $seg1 == 'ru')
    {
        $langSeg = $uri_segments[1];
    }
    else
    {
        $langSeg = 'en';
    }
?>
@section('content')
<style>
  p{
    line-height: 1.6 !important;
  }
  .card {
    background-color: #000 !important;
    color: #fff !important;

  }
  .card > .card-body,
  .card > .card-body > p {
    border-radius: 0 !important;
    text-align: justify !important;
    line-height: 1. !important;
    padding-left: 5px !important;
    padding-right: 5px !important;
  }

  .card > .card-body > p {
    font-size: 1rem !important;
  }
</style>
<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container-fluid containerization d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.services') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>

<section class="mt-5">
    <div class="container-fluid containerization">

        <h3 class="text-center"></h3>

    </div>
</section>
@if ($langSeg == 'ar')

  <section class="mt-5 mb-5" style="direction: rtl;">
      <div class="container-fluid containerization">
          <div class="row mb-4">
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/research-advisory-edge.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">البحوث والاستشارات</h5>
                        <p class="card-text" style="line-height:24px">
                          تمتلك إيدج ريالتي الخبرة والخبراء اللازمة لضمان اتخاذ عملائنا لقرارات استثمارية مدعومة بالبيانات لزيادة عائداتهم. تغطي خدمات الأبحاث والاستشارات الخاصة بنا ما يلي:الاستشارات الاستثمارية وتقييم المحافظة الاستثمارية والصناعية ودراسة بحوث التسويق الخاصة بالمشروعات

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-management-edgerealty.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">إدارة الأصول العقارية</h5>
                        <p class="card-text" style="line-height:24px">

                                  مع أكثر من 500 عقار بقيمة تزيد عن مليار درهم في محفظة إدارة الممتلكات لدينا ، فإن شركةإيدج رياليتي رائدة في عمليات إدارة الممتلكات والأصول الفعالة لضمان أن عملائنا يمكنهم أن يطمئنوا بأن استثماراتهم في أيديهم. نحن نعمل على ضمان أن الأصول تحت إدارتنا تولد التدفق النقدي الأمثل وزيادة رأس المال لزيادة عوائد مستثمرينا.

                        </p>

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/mortgages-edgerealty.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">استشارات الرهون العقارية</h5>
                        <p class="card-text" style="line-height:24px">
                          تقدم شركة إيدج العقارية استشارات الرهن العقاري الأمثل التي تعالج الشواغل الأساسية للمحتاجين. لدينا
                          فريق من الخبراء بارعين ولديهم فهم ضمني لما يجب القيام به ، عندما يتعلق الأمر بالتعامل مع مختلف القضايا المتعلقة بالرهن العقاري.
                        نظرًا لأننا نعمل بشكل وثيق مع البنوك والمطورين ، يمكننا دعم عملائنا برأي الخبراء من بداية المعاملة.
                        </p>

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/marketing.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">التسويق والمبيعات والتأجير</h5>
                        <p class="card-text" style="line-height:24px">

                                      شركة إيدج ريالتي رائدة في قطاع العقارات في دبي بفضل استراتيجياتها المبتكرة للمبيعات والتسويق والتأجير. نحن نتبع نهجًا حيويًا في هذه الخدمات من خلال استخدام أحدث التقنيات لتحديد واستهداف جمهورنا بالمعلومات ذات الصلة استنادًا إلى اهتماماتهم والديموغرافيا والأهداف الاستثمارية. من استوديو واحد إلى عدة طوابق أو حتى المباني الكاملة ، لدينا سجل حافل من إكمال الصفقات المعقدة بنجاح في الوقت المناسب.


                        </p>

                      </div>
                    </div>
              </div>


              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-snaging.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">الفحص والتفتيش</h5>
                        <p class="card-text" style="line-height:24px">
                          حن نركز على كل التفاصيل لضمان حصول عملائنا على أفضل الأصول جودة بغض النظر عن ميزانيتهم. تمشيا مع أعلى المعايير الدولية لفحص الممتلكات والعطش ، يوفر فريقنا من المهنيين المرخصين المؤهلين خدمات فحص وتفتيش متعمقة لأي نوع من الممتلكات لضمان تسليم الأصول الخاضعة لإدارتنا في أعلى حالة.

                        </p>

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/crm.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">إدارة علاقات العملاء ، تسليم وإدارة المشاريع</h5>
                        <p class="card-text" style="line-height:24px">

                                  أحد أكثر الجوانب التي يتم تجاهلها في سوق العقارات اليوم هو الإدارة الفعالة لعلاقات العملاء ، والتسليم ، وإدارة المشاريع. للتأكد من أن عملائنا مطلعون جيدًا على أحدث التطورات في مجال العقارات ، فإننا نقدم حل متكامل الخدمات للمطورين الذين يحتاجون إلى خدمة عملاء على مستوى عالمي بما يتماشى مع أعلى معايير الصناعة. كما نقدم خدمات التسليم وإدارة المشاريع لمساعدة المطورين على فهم متطلبات العميل بشكل أفضل خلال دورة التطوير من منظور فريد.


                        </p>

                      </div>
                    </div>
              </div>
          </div>


      </div>
  </section>

@elseif ($langSeg == 'ru')
  <section class="mt-5 mb-5" >
      <div class="container-fluid containerization">
          <div class="row mb-4">
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/research-advisory-edge.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">ПОИСК НЕДВИЖИМОСТИ И КОНСУЛЬТАЦИИ</h5>
                        <p class="card-text" style="line-height:24px">

                          Edge Realty обладает опытом и знаниями, необходимыми для того, чтобы наши клиенты принимали обоснованные данными инвестиционные решения для максимизации их доходности. Наши исследовательские и консультационные услуги охватывают следующие этапы:
                          Инвестиционное консультирование и оценка экономических и промышленных комплексов
                          Исследование тенденций рынка (макроуровень)
                          Маркетинговые исследования (конкретные проекты)
                          Аудиторские исследования

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-management-edgerealty.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">   ПОМОЩЬ В УПРАВЛЕНИИ НЕДВИЖИМОСТЬЮ</h5>
                        <p class="card-text" style="line-height:24px">

                          В нашем портфолио управления недвижимостью более 500 объектов недвижимости стоимостью более 1 млрд дирхамов. Edge Realty
                          разработала эффективные процессы управления недвижимостью и активами, чтобы наши клиенты были уверены в том, что их инвестиции находятся в надежных руках. Мы работаем над тем, чтобы активы под нашим управлением генерировали оптимальный
                          денежный поток и прирост капитала для максимизации прибыли для наших инвесторов.

                        </p>

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/mortgages-edgerealty.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">КОНСУЛЬТАЦИИ ПО ИПОТЕКЕ</h5>
                        <p class="card-text mb-4" style="line-height:24px">



                          Edge Real Estate предлагает оптимальные консультации по ипотечному кредитованию, которые решают основные проблемы клиентов. У нас существует команда компетентных экспертов, имеющих понимание того, что необходимо сделать, когда речь заходит о решении любых вопросов, связанных с ипотекой. Мы тесно сотрудничаем с банками и застройщиками и можем поддержать наших клиентов экспертным мнением с самого начала сделки.

                        </p>

                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/marketing.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">МАРКЕТИНГ И ПРОДАЖИ</h5>
                        <p class="card-text" style="line-height:24px">



                          Edge Realty является лидером в индустрии недвижимости Дубая, благодаря своим инновационным стратегиям продаж, маркетинга и аренды. Мы применяем динамичный подход к этим услугам, используя новейшие технологии, чтобы точно определить и направить на нашу аудиторию соответствующую информацию, основанную на их интересах, демографических характеристиках и инвестиционных целях. От небольшой студии до нескольких этажей или даже целых зданий, у нас есть проверенный опыт успешного и своевременного завершения сложных сделок.

                        </p>
                        <br>

                      </div>
                    </div>
              </div>


              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-snaging.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">ОЦЕНКА НЕДВИЖИМОСТИ</h5>
                        <p class="card-text" style="line-height:24px">

                          В Edge Realty мы уделяем внимание каждой детали, чтобы наши клиенты получали активы наилучшего качества независимо от их бюджета. В соответствии с высочайшими международными стандартами инспекции и обследования недвижимости, наша команда квалифицированных лицензированных специалистов предоставляет углубленные услуги по обследованию и инспекции любого типа недвижимости, чтобы активы под нашим управлением оставались в самом лучшем состоянии.

                        </p>
                        <br><br><br><br>
                      </div>
                    </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/crm.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">CRM, ПЕРЕДАЧА И УПРАВЛЕНИЕ ПРОЕКТАМИ</h5>
                        <p class="card-text mb-3" style="line-height:24px">

                          Одним из наиболее упускаемых из виду аспектов на современном рынке недвижимости является эффективное управление взаимоотношениями с клиентами, передача и управление проектами. Для того, чтобы наши клиенты были хорошо информированы и находились в курсе последних событий в сфере недвижимости, мы предлагаем CRM-решение с полным спектром услуг для застройщиков, которым требуется обслуживание мирового класса
                          в соответствии с высочайшими отраслевыми стандартами. Мы также
                          предоставляем услуги по передаче и управлению проектами, чтобы помочь застройщикам лучше понять требования клиентов с уникальной точки зрения во время цикла разработки.


                        </p>

                      </div>
                    </div>
              </div>
          </div>


      </div>
  </section>

@else
  <section class="mt-5 mb-5" >
      <div class="container-fluid containerization">
          <div class="row mb-4">

              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class="hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/research-advisory-edge.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Research & Advisory</h5>
                        <p class="card-text" style="line-height:24px">
                          Edge Realty has the experience and expertise required to ensure our clients make
                          data-backed investment decisions to maximize their returns. Our research and advisory services cover the following:
                          Investment Advisory and Portfolio EvaluationEconomic and Industry Developments and TrendsMarket Research Studies
                          (Macro Level)Marketing Research Studies (Project-Specific)Research Auditing

                      </div>
                    </div>
              </div>

              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-management-edgerealty.jpg')}}" class="img-fluid" />

                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Property Asst Management</h5>
                        <p class="card-text" style="line-height:24px">
                          With more than 500 properties with a value of more than AED 1 Billion in our property management portfolio,
                          Edge Realty has pioneered effective property and asset management processes to ensure our clients can rest assured that their investments are in the right hands.
                          We work to ensure assets under our management generate optimal cash flow and capital appreciation to maximize returns for our investors.

                        </p>

                      </div>
                    </div>
              </div>

              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/mortgages-edgerealty.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Mortgages Advisory</h5>
                        <p class="card-text mb-4" style="line-height:24px">
                          Edge Real Estate offers optimal mortgage advisory that address the core concern of those in need. We have a
                          team of experts who are proficient and have a tacit understanding of what needs to be done, when it comes to handling the various mortgage related issues.
                          Since we are working closely with banks and developers we can support our clients with expert opinion from the start of transaction.
                        </p>

                      </div>
                    </div>
              </div>

              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/marketing.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Marketing and Sales</h5>
                        <p class="card-text" style="line-height:24px">
                          Edge Realty has been a leader in the Dubai real estate industry thanks to its innovative sales, marketing, and leasing strategies.
                          We take a dynamic approach to these services by using the latest technology to pinpoint and target our audience with relevant information based on their interests, demographics, and investment goals.
                          From a single studio to multiple floors or even full buildings, we have a proven track record of successfully completing complex deals in a timely manner.
                        </p>
                        <br>

                      </div>
                    </div>
              </div>


              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/property-snaging.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Property Snagging</h5>
                        <p class="card-text" style="line-height:24px">
                          At Edge Realty, we focus on every detail to ensure our clients receive the best quality asset regardless of their budget.
                          In line with the highest international standards of property inspection and snagging, our team of qualified licensed professionals provides in-depth
                          snagging and inspection services for any type of property to ensure assets under our management are delivered in the highest condition.
                        </p>
                        <br><br><br><br>
                      </div>
                    </div>
              </div>

              <div class="col-lg-4 mb-4">
                  <div class="card">
                      <div class=" hover-overlay ripple" data-mdb-ripple-color="light">
                          <img src="{{URL::asset('public/assets/images/services/crm.jpg')}}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">CRM, Handover & Project Management</h5>
                        <p class="card-text mb-3" style="line-height:24px">
                          One of the most overlooked aspect in today’s real estate market is effective customer relationship management,
                          handover, and project management. To ensure our clients are well-informed and up to date on the latest developments in the real estate industry, we offer a full-service CRM solution for developers that require world-class customer service in line with the top industry standards.
                          We also provide handover and project management services to help developers better understand client requirements during the development cycle from a unique perspective.
                        </p>

                      </div>
                    </div>
              </div>
          </div>


      </div>
  </section>
@endif





@endsection
