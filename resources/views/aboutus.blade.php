@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');

?>

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

<?php
    $finalUrl = '/ar/home';
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if($uri_path == '/' || $uri_path == '/home' )
    {
        $finalUrl = '/ar/home';

    }


    else
    {
        $uri_segments = explode('/', $uri_path);
        $seg1 = $uri_segments[1];
        if($seg1)
        {
            if($seg1 == 'en')
            {
                $replacements2 = array(1 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);


            }
            elseif($seg1 == 'ar')
            {
                $replacements2 = array(1 => "en");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);


            }
        }
        else
        {
                $replacements2 = array(1 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);

        }
    }


?>


@if ($langSeg == 'ru')

    @section('meta_detail')

            <title> О нас | Лучшая компания по недвижимости в Дубае | Edge Realty  </title>
            <meta name="description" content="Изучите недвижимость для продажи и аренды в Дубае с помощью edgerealty. У нас есть широкий выбор вилл, апартаментов и коммерческой недвижимости с полной подтвержденной информацией."/>
            <meta name="keywords" content="Свяжитесь с нами или напишите нам  "/>

    @endsection

@else

    @section('meta_detail')

        <title> About Us | Best Real Estate Company in Dubai | Edge Realty  </title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with edgerealty. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>

    @endsection

@endif


@section('content')

<style>
    .lineHeight {
        line-height: 1.5 !important;
    }
</style>
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
            <?php
                $finalUrl = '/ar/home';
                $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                if($uri_path == '/' || $uri_path == '/home' )
                {
                    $finalUrl = '/ar/home';

                }


                else
                {
                    $uri_segments = explode('/', $uri_path);
                    $seg1 = $uri_segments[2];
                    if($seg1)
                    {
                        if($seg1 == 'en')
                        {
                            $replacements2 = array(2 => "ar");
                            $basket = array_replace($uri_segments, $replacements2);
                            $finalUrl = implode("/",$basket);


                        }
                        elseif($seg1 == 'ar')
                        {
                            $replacements2 = array(2 => "en");
                            $basket = array_replace($uri_segments, $replacements2);
                            $finalUrl = implode("/",$basket);


                        }
                    }
                    else
                    {
                            $replacements2 = array(1 => "ar");
                            $basket = array_replace($uri_segments, $replacements2);
                            $finalUrl = implode("/",$basket);

                    }
                }


            ?>
    <section>
        <header class="my-5 pt-3">

        </header>
    </section>



    @if ($langSeg == 'ar')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-lg-block d-none" style="height: 500px; width: 100%; " alt="">

                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-block d-lg-none" style="height: 200px; width: 100%; " alt="">

                        <h1 class="mt-4 text-white text-center">
                            About Edge Realty
                        </h1>

                    </div>
                </div>
            </div>
        </section>


        <section class="mt-2" style="direction: rtl">
            <div class="container-fluid containerization">
                <div class="row">

                    <div class="col-lg-3">
                        <img src="{{URL::asset('public/assets/asset/about.webp')}}" class="img-responsive" alt="" style="height: 45vh !important;">

                    </div>

                    <div class="col-lg-9">

                            <h2> إيدج ريالتي</h2><br>
                            <p  class="lineHeight">إيدج ريالتي هي شركة عقارية تقدم خدمات البحث عن العقارات وتسويق العقارات والمبيعات والإيجارات وإدارة الأصول. نحن نقدم خدمة البحث عن الممتلكات العقارات واسعة النطاق في الأسواق التجارية والسكنية لكل من المستثمرين والملاك . تشمل خدمتنا الوصول إلى العقارات الحصرية  ، والخبرة في التفاوض ، والاستشارات القانونية ، والمساعدة في جميع مراحل عملية النقل وتقديم خدمة ما بعد البيع بما في ذلك خدمات إدارة المنازل والممتلكات والإيجارات.

                                في إيدج ريالتي  يعني نموذج العمل لدينا أن كل وكيل محترف ومستقل في منطقته ، مما يجعلنا في وضع فريد لنقدم ، لعملائنا ، تجربة أكثر تعمقا وثاقبة علي مدي سنوات طوال من الخبرات العقارية في عمليات البيع والشراء والايجار والادارة الكاملة للعقارات في جميع مناطق دبي .</p>
                            <p  class="lineHeight">سواء كنت تبحث عن شراء أو بيع أو استثمار أو تأجير عقار ، فإن المستشار  العقاري  الذي اخترته سيرشدك خلال عملية الشراء أو البيع  بجميع العقارات المتاحة في السوق وكذلك جميع الخطوات الأساسية . </p>


                    </div>

                </div>

            </div>
        </section>

    @elseif( $langSeg == 'ru' )
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-lg-block d-none" style="height: 500px; width: 100%; " alt="">

                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-block d-lg-none" style="height: 200px; width: 100%; " alt="">

                        <h1 class="mt-4 text-white text-center">
                            About Edge Realty
                        </h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="mt-3">
            <div class="container-fluid containerization">
                <div class="row">

                    <div class="col-lg-3">
                        <img src="{{URL::asset('public/assets/asset/about.webp')}}" class="img-responsive" alt="" style="height: 100% !important;">
                    </div>

                    <div class="col-lg-9">

                            <h2>ОСНОВАННАЯ В 2011 ГОДУ, НАША КОМПАНИЯ ЯВЛЯЕТСЯ ОДНИМ ИЗ ВЕДУЩИХ АГЕНТСТВ НЕДВИЖИМОСТИ ВДУБАИ</h2><br>

                            <p class="lineHeight">Edge Realty — это агентство недвижимости, предлагающее поиск и маркетинг недвижимости, продажу, сдачу в аренду и услуги по управлению активами.</p>
                            <p class="lineHeight"> Мы предоставляем широкий спектр услуг по поиску и приобретению недвижимости на коммерческой основе и жилой недвижимости как для инвесторов, так и для арендаторов. Наши услуги включают доступ к эксклюзивным объектам недвижимости, независимые консультации, опыт ведения переговоров, юридические консультации, помощь в процессе оформления сделки, а также послепродажное обслуживание, включая управление домом и недвижимостью и услуги по сдаче в аренду.</p>
                            <p class="lineHeight">Наша бизнес-модель означает, что каждый агент является авторитетным и независимым профессионалом в своем деле, что дает  уникальную возможность предложить нашим клиентам более глубокий и проницательный опыт.</p>
                            <p class="lineHeight">Наша конечная цель — обеспечить высокий уровень обслуживания клиентов, в то же время давая нашим консультантам возможность вывести недвижимость на рынок с феноменальным маркетингом и поддержкой со стороны бэк-офиса. После получения инструкций Ваш консультант будет управлять всем процессом, начиная со сбора подробной информации и заканчивая обработкой каждого запроса, просмотров и предложений, а также оставаясь единственным контактным лицом на протяжении всего процесса сделки. Эта уникальная структура позволяет нашим консультантам уделять больше времени как нашим объектам недвижимости, так и нашим клиентам.</p>
                            <p class="lineHeight">Независимо от того, хотите ли вы купить, продать, инвестировать или сдать в аренду недвижимость, выбранный Вами консультант будет сопровождать Вас в процессе сделки.</p>


                    </div>

                </div>

            </div>
        </section>
    @else
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-lg-block d-none" style="height: 500px; width: 100%; " alt="">

                        <img src="{{URL::asset('public/assets/asset/about/header.webp')}}" class="img-responsive d-md-block d-block d-lg-none" style="height: 200px; width: 100%; " alt="">

                        <h1 class="mt-4 text-white text-center">
                            About Edge Realty
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-3">
            <div class="container-fluid containerization">
                <div class="row">

                    <div class="col-lg-3 d-md-block d-lg-block d-none">
                        <img src="{{URL::asset('public/assets/asset/about.webp')}}" class="img-responsive" alt="" style="height: 100% !important;">

                    </div>

                    <div class="col-lg-9 lineHeight text-justify" >

                            <p class="lineHeight text-justify" style="text-align: justify; color: grey !important;">Established in 2011, we are one of the leading real estate agency in Dubai</p>

                            <p class="lineHeight text-justify" style="text-align: justify; color: grey !important;">Edge Realty it's a Real Estate company offering property search, property marketing, sales, lettings, and Asset management services.</p>
                            <p class="lineHeight text-justify" style="text-align: justify; color: grey !important;"> We provide an extensive property search and acquisition service across the commercial and residential markets for both investors and occupiers. Our service includes access to exclusive properties, independent advice, negotiation expertise, legal advice, assistance throughout the conveyancing process, and after-sales care including home and property management and lettings services.
                                Our business model means each agent is an established and independent professional in their neighborhood, making us uniquely positioned to offer you, our clients, a more in-depth and insightful experience.
                            </p>
                            <p class="lineHeight text-justify" style="text-align: justify; color: grey !important;">Our ultimate focus is to provide a superior level of client service, whilst at the same time offering our Consultants the opportunity to launch properties to the market with phenomenal marketing and back-office support. Once instructed, your dedicated Consultant will manage the entire process, from the creation of the details to handling every inquiry, viewings, and offers as well as remaining the sole point of contact during the entire transaction process. This unique structure enables our Consultants to dedicate more time to both our properties and clients. Whether you are looking to buy, sell, invest, or rent a property, your selected Consultant will guide you throughout the entire property process</p>


                    </div>

                </div>

            </div>
        </section>
    @endif


    @if ($langSeg == 'ar')

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-8 text-white">
                        <p class="my-0 py-0 fw-bold">
                            МИССИЯ
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            مهمة شركتنا هي توفير مستوى متميز من الخدمة والخبرة في سوق العقارات المبتكرة والطموحة. هذه الشركة العقارية ، مكرسة لأعلى المعايير والأنظمة والأداء اللازم لتحقيق جميع أحلامك العقارية.
                        </p>

                        <p class="my-0 py-0 fw-bold">
                            رؤيتنا
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            تتمثل رؤية شركتنا في تحقيق أعلى المعايير الممكنة لسوق العقارات مع إنشاء وكالتنا كشركة عقارية رائدة ومفضلة في دبي والمناطق المحيطة بها.
                        </p>

                        <p class="my-0 py-0 fw-bold">
                         القيم الجوهرية
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            التواصل والالتزام ورعاية العملاء هي القيم الأساسية التي تنبثق في كل نشاط نقوم به. من خلال الاستماع وتخصيص الوقت لفهم احتياجات عملائنا ، يمكننا تقديم مشورة عقارية شاملة وشاملة. نحن فخورون بتقديم نتائج استثنائية باستمرار لتحسين قيمة الأصول العقارية لعملائنا ، في الداخل والخارج.
                        </p>
                    </div>


                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-lg-block d-none" style="padding-left: 100px !important;">
                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Team
                        </p>
                    </div>

                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-block d-lg-none mx-1">
                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Team
                        </p>
                    </div>
                </div>
            </div>
        </section>

    @elseif( $langSeg == 'ru' )

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-8 text-white">
                        <p class="my-0 py-0 fw-bold">
                            МИССИЯ
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                           Миссия компании Edge Realty заключается в том, чтобы обеспечить выдающийся уровень обслуживания и профессионализма на иновационном и амбициозном рынке
                           недвижимости. Компания Edge Realty привержена самым высоким стандартам, системам и производительности, необходимым для того, чтобы исполнить Ваши мечты о доме.
                        </p>

                        <p class="my-0 py-0 fw-bold">
                            ВИДЕНИЕ
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            Видение Edge Realty заключается в достижении самых высоких возможных стандартов рынка недвижимости, при этом наше агентство уже утвердилось в
                            качестве ведущей и предпочтительной компании по недвижимости в Дубае и прилегающих районах.
                        </p>

                        <p class="my-0 py-0 fw-bold">
                            ОСНОВНЫЕ ЦЕННОСТИ
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            Общение, приверженность и забота о клиенте —  вот основные ценности, которых мы придерживаемся в любой своей деятельности. Прислушиваясь и уделяя
                            время пониманию потребностей наших клиентов, мы можем предоставить всесторонние, целостные консультации по вопросам недвижимости. Мы гордимся тем, что
                            неизменно добиваемся исключительных результатов, оптимизируя стоимость недвижимости наших клиентов, как в стране, так и за рубежом.
                        </p>
                    </div>


                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-lg-block d-none" style="padding-left: 100px !important;">
                        <p class="my-0 py-0 fw-bold">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Team
                        </p>
                    </div>

                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-block d-lg-none mx-1">
                        <p class="my-0 py-0 fw-bold">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important;">
                            Team
                        </p>
                    </div>
                </div>
            </div>
        </section>

    @else

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-8 text-white">
                        <p class="my-0 py-0 fw-bold">
                            Mission
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            The mission of Edge Realty, Company is to provide an outstanding level of service and expertise
                            in the real estate market that is innovative and ambitious. This Real Estate,
                            Company is dedicated to the highest standards, systems, and performance necessary to fulfill all of your real estate dreams
                        </p>

                        <p class="my-0 py-0 fw-bold">
                            Vision
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            The vision of Edge Realty, Company is to achieve the highest possible standards of the real estate market while establishing
                            our agency as the premier and preferred real estate company in Dubai and the surrounding areas
                        </p>

                        <p class="my-0 py-0 fw-bold">
                            Core Values
                        </p>
                        <p class="text-justify lineHeight" style="color: grey !important; font-size: 1rem !important; text-align: justify !important;">
                            Communication, commitment, and client care are the core values that emanate throughout every activity that we undertake.
                            By listening and taking the time to understand our clients’ needs, we’re able to purvey comprehensive, holistic real estate advice.
                            We’re proud to consistently deliver exceptional results to optimise the value of our clients’ property assets, at home and abroad
                        </p>
                    </div>


                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-lg-block d-none" style="padding-left: 100px !important;">
                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Team
                        </p>
                    </div>

                    <div class="col-lg-4 text-white h-100 my-auto d-md-block d-block d-lg-none mx-1">
                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            1750+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Portals Listing
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            390+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Off plan Projects
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            60+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Nationalities
                        </p><br>

                        <p class="my-0 py-0 fw-bold" style="font-size: 1.5rem !important;">
                            28+
                        </p>
                        <p class="text-justify lineHeight" style="font-size: 1.1rem !important; text-align: justify !important; color: grey">
                            Team
                        </p>
                    </div>
                </div>
            </div>
        </section>

    @endif






    @if ($langSeg == 'ar')

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 100%; height: 430px !important; ">
                            <a href="{{url( $langSeg .'/'.'team')}}">
                                <img src="{{URL::asset('public/assets/asset/about/1.1.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'team')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutMeetOurTeam') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutMeetOurTeamBody') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 400px;height: 430px !important; ">
                            <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                <img src="{{URL::asset('public/assets/asset/about/company.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>

                            <div class="card-body px-3">
                                <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutCompanyBrandGuideline') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutCompanyBrandGuidelineBody') }}
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 400px;height: 430px !important; ">
                            <a href="{{url( $langSeg .'/'.'career')}}">
                                <img src="{{URL::asset('public/assets/asset/about/hire.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'career')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutHiring') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutHiringBody') }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @elseif( $langSeg == 'ru' )

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 100%; height: 430px !important; ">
                            <a href="{{url( $langSeg .'/'.'team')}}">
                                <img src="{{URL::asset('public/assets/asset/about/1.1.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'team')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutMeetOurTeam') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutMeetOurTeamBody') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 400px; height: 430px !important;">
                            <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                <img src="{{URL::asset('public/assets/asset/about/company.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>

                            <div class="card-body px-3">
                                <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutCompanyBrandGuideline') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutCompanyBrandGuidelineBody') }}
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 400px; height: 430px !important;">
                            <a href="{{url( $langSeg .'/'.'career')}}">
                                <img src="{{URL::asset('public/assets/asset/about/hire.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'career')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutHiring') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutHiringBody') }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @else

        <section class="mt-5">
            <div class="container-fluid containerization">
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 100%; height: 430px !important; ">
                            <a href="{{url( $langSeg .'/'.'team')}}">
                                <img src="{{URL::asset('public/assets/asset/about/1.1.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'team')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutMeetOurTeam') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutMeetOurTeamBody') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 100%; height: 430px !important;">
                            <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                <img src="{{URL::asset('public/assets/asset/about/company.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>

                            <div class="card-body px-3">
                                <a href="{{URL::asset('uploads/Edge Realty Company Profile.pdf')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutCompanyBrandGuideline') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutCompanyBrandGuidelineBody') }}
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 text-white">
                        <div class="card bg-black textwhite my-5 rounded-0" style="width: 100%; height: 430px !important;">
                            <a href="{{url( $langSeg .'/'.'career')}}">
                                <img src="{{URL::asset('public/assets/asset/about/hire.jpg')}}" style="width: 100%; height: 300px;" class="card-img-top rounded-0" alt="Hollywood Sign on The Hill"/>
                            </a>
                            <div class="card-body px-3">
                                <a href="{{url( $langSeg .'/'.'career')}}">
                                    <h5 class="card-title text-white">{{ trans('frontLang.aboutHiring') }}</h5>
                                </a>

                                <p class="card-text text-capitalize" style="line-height: 1.3 !important; color: grey !important;">
                                    {{ trans('frontLang.aboutHiringBody') }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @endif




@endsection
