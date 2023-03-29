
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

        <title> Часто задаваемые вопросы| Edge Realty Real Estate        </title>
        <meta name="description" content="Изучите недвижимость для продажи и аренды в Дубае с помощью edgerealty. У нас есть широкий выбор вилл, апартаментов и коммерческой недвижимости с полной подтвержденной информацией."/>
        <meta name="keywords" content="Свяжитесь с нами или напишите нам  "/>


@endsection

@else

@section('meta_detail')

        <title> Frequently Ask Questions| Edge Realty Real Estate  </title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with edgerealty. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection

@endif


@section('content')
<style scoped >
  p{
    line-height: 1.6 !important;
  }


  button {
    color: #ccc !important;
    background-color: #1c1c1c !important;
    border-radius: 0 !important;
  }

  .accordion {
    border-radius: 0 !important;
  }

  textarea {
    background-color: #1c1c1c !important;
  }

</style>

<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: #1c1c1c;">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.frequentlyask') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>



<section class="mt-5">
    <div class="container">

        @if ( $langSeg == 'ar' )

            <P>If you are looking For properties for sale in Dubai, look no further than this website. We round off the things you need to ensure a smooth process. Edgerealty is the largest real estate website with a wide range of residential and commercial properties for sale.</P>

        @elseif( $langSeg == 'ru' )

            <p>Если Вы ищете недвижимость для продажи в Дубае, обратите внимание на этот сайт.  Мы расскажем обо всем, что Вам необходимо знать для обеспечения гладкого процесса. Edge Realty —  крупнейший сайт по недвижимости с широким выбором жилой и коммерческой недвижимости на продажу.</p>

        @else

            <P>If you are looking For properties for sale in Dubai, look no further than this website. We round off the things you need to ensure a smooth process. Edgerealty is the largest real estate website with a wide range of residential and commercial properties for sale.</P>

        @endif




    </div>




</section>

@if ( $langSeg == 'ar' )

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" style="    background-color: #1c1c1c;" type="button"  data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                What is Free Hold Property?
                            </button>
                        </h2>
                        <div id="collapseOne"  class="accordion-collapse collapse" aria-labelledby="headingOne" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>The purchase of property on a freehold basis means that the property is registered in the owner’s name by way of a Title Deed registered in the Dubai Land Department. The owner has the right to sell, lease or rent his/her property at his/her discretion.</p>

                                <p>Areas for freehold properties are designated areas for expatriates, whereas non- freehold property is property limited to UAE Nationals and GCC Nationals.</p>


                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button  class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What Is DLD?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"  aria-labelledby="headingTwo" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>DLD is the abbreviation for Dubai Land Department. It is the regulatory body by the government that deals with all property and real estate related legislation, organisation, and services for any real estate transactions in Dubai.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What is OFF-Plan?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>An off-plan property alludes to a property whose development is yet to start or is in its primer phases of development.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfive">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                How to sell an off-plan property in Dubai?
                            </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>You can sell your off plan property after you pay a specific percent of the property value based on your SPA with the property developer. Usually, it is after you pay 30-40% of the property value. Keep in mind that your off plan property in Dubai may have fierce competition in case the developer still has availability since developers run generous property offers these days. If you decide to sell, then check the current market prices of your property, then give it to property experts to sell it for you. -- Sometimes it is worth paying some commission to the property broker to push your property in the real estate market.After you get the right buyer, you go to the developer office to obtain NOC from the developer that costs around 5,000 AED which is usually paid by the buyer. After that, you go to the trustee office with the buyer and agent. There you get the selling price of your shares in the property as a manager cheque from the buyer, and the buyer usually pays the transfer fees that is 5,000 AED in case of the property price over 500,000 AED and 3,500 AED in case the property value below 500,000. The buyer also pays 4% of the total property value as registration fees to Dubai Land Department.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                Can a foreigner purchase/own an off-plan property in Dubai?
                            </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Any person of any nationality, whether based overseas or a resident can purchase or own in any freehold properties in Dubai. Buyers and investors are not required to hold any type of residency or similar permit in order to buy an off-plan property in Dubai. Popular freehold areas in Dubai include Dubai Marina, Downtown Dubai, Jumeirah Village Circle (JVC), International City, and Palm Jumeirah. These locations are ideal to both new and existing property buyers.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                Why is off-plan property in Dubai a good investment?
                            </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Once you have identified which location and type of lifestyle you require, being aware of its benefits in terms of property value and return on investments is a must. The best thing about purchasing an off-plan property in Dubai is that it offers quick asset value appreciation especially those projects located in prime areas. If you are an investor, taking advantage of today’s market is a wise decision. By purchasing an off-plan now and wait for the right time to exit or resale your property especially when there is a good opportunity in the market, then you can definitely sell it at a much higher price. Furthermore, buying an the off-plan project does not require a large amount of money as most off-plan investments in Dubai comes with attractive payment terms and deals.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeight">
                            <button class="accordion-button collapsed" style="    background-color: #000;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                Is buying an off-plan a good idea for first-time buyers?
                            </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Buying an off-plan property allows investors to acquire a unit at its lowest price compared to ready properties. For first time buyers, off-plan properties for sale in Dubai offers a great opportunity in terms of return on investments (ROI), income-producing assets (for holiday home), and market value appreciation. These type of properties offers a number of incentives and benefits allowing first-time buyers to enter today’s Dubai real estate market at a more affordable price. Also, real estate developers offer attractive payment terms, making it easier for first-time buyers to avail off-plan properties in Dubai.If you are looking for the right property investment or a home in the future, you can browse on the list of off-plan properties in Dubai or simply get in touch with us to find out more information about these projects.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingnine">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                Can I sell an off plan property before its completion date?
                            </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Yes, you can sell off plan property before the completion date in Dubai.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingten">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                Which area in Dubai Offers the best off-plan property?
                            </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Fortunately for investors and end-users, Dubai is home to hundreds of affordable and luxury off-plan projects. These developments are usually located across the city’s most prestigious destinations, close to famous landmarks, eccentric man-made islands, nature-inspired communities, and cosmopolitan living right in the center of Dubai. The city has a lot of prime locations with off-plan projects ideal for your lifestyle needs. You can choose from beachfront communities at Bluewaters Island, Dubai Harbour, Jumeirah Bay Island, and Palm Jumeirah for example. Live on a tranquil environment setup at Emaar South, Dubai Hills Estate, and Al Barari. Or if you prefer a city lifestyle, urban off-plan projects are available in Business Bay, Downtown Dubai and Dubai Marina just to name a few.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeleven">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                Can you get a mortgage on off plan?
                            </button>
                            </h2>
                            <div id="collapseeleven" class="accordion-collapse collapse" aria-labelledby="headingeleven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Buying off-plan has its own unique financial challenges. Most developers will want to see that you have mortgage finance in place before you exchange contracts. You will also need to pay a deposit of about 5 or 10 per cent at exchange. However, most lenders will only hold mortgages open for six months so if your property takes longer than that to build then you face having to reapply for a mortgage later on. If you can’t get one you could then lose your deposit and have to start looking for a new property</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingtwelve">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                What is DLD Fee Waiver?
                            </button>
                            </h2>
                            <div id="collapsetwelve" class="accordion-collapse collapse" aria-labelledby="headingtwelve" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>A DLD Waiver is the waiver of the DLD fee that is levied on property purchase. The DLD Fee is 4% of the property value and is payable by the buyer. Ergo a DLD Waiver means the buyer does not pay this fee and it is instead paid by the developer.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" style="background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What is RERA Dubai?
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>RERA stands for Real Estate Regulatory Agency and is part of the DLD that takes care of the regulations in the real estate industry in Dubai. It is in charge of handling relationship between all parties of a contract and organises the exchange process of the properties.</p>
                            </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h3>If You Have a Still Question Please Contact us.</h3>

                </div>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                        @csrf

                        <div class="mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                        </div>

                        <div class="mb-4">
                            <textarea name="message" class="form-control" id="textAreaExample" rows="3" placeholder="{{ trans('frontLang.message') }}"></textarea>

                        </div>
                        <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>


            </div>

        </div>
    </section>

@elseif( $langSeg == 'ru' )

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" style="    background-color: #1c1c1c;" type="button"  data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                ЧТО ТАКОЕ НЕДВИЖИМОСТЬ В СВОБОДНОЙ СОБСТВЕННОСТИ?
                            </button>
                        </h2>
                        <div id="collapseOne"  class="accordion-collapse collapse" aria-labelledby="headingOne" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Приобретение недвижимости на условиях свободного владения означает, что недвижимость зарегистрирована на имя владельца посредством титульного документа, зарегистрированного
                                    в Земельном департаменте Дубая. Владелец имеет право продать или сдать в аренду недвижимость по своему усмотрению.
                                    </p>

                                <p>Районы, в которых расположена недвижимость, находящаяся в свободной собственности, —  это районы, предназначенные для экспатриантов, в то время как недвижимость, не в свободной собственности, предназначена только для граждан ОАЭ и стран Персидского залива.</p>


                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button  class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ЧТО ТАКОЕ DLD?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"  aria-labelledby="headingTwo" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>DLD – это аббревиатура, обозначающая Земельный департамент Дубая. Это регулирующий орган правительства, который занимается всеми вопросами, связанными с имуществом и смежным законодательством, организацией и услугами, связанными с недвижимостью, для любых сделок с недвижимостью в Дубае.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ЧТО ТАКОЕ НЕДВИЖИМОСТЬ НА ЭТАПЕ СТРОИТЕЛЬСТВА?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Недвижимость на этапе строительства —это недвижимость, строительство которой еще не началось или находится на начальной стадии развития.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfive">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                КАК ПРОДАТЬ НЕДВИЖИМОСТЬ НА ЭТАПЕ СТРОИТЕЛЬСТВА В ДУБАЕ?
                            </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Вы можете продать свою недвижимость на этапе строительства после того, как заплатите определенный процент от стоимости недвижимости на основании Вашего договора с застройщиком.
                                    Обычно это происходит после уплаты 30-40% от стоимости недвижимости. Имейте в виду, что Ваша недвижимость в Дубае может иметь жесткую конкуренцию в случае, если у застройщика еще есть свободные места, так как застройщики  в наши дни делают щедрые предложения. Если Вы решили продавать долю, сначала проверьте текущие рыночные цены на Вашу недвижимость, а затем передайте ее специалистам по недвижимости, чтобы они продали ее для Вас. Иногда стоит заплатить комиссионные брокеру по продаже недвижимости, чтобы продвинуть Вашу собственность на рынке.
                                    После того, как Вы нашли подходящего покупателя, Вы отправляетесь в офис застройщика, чтобы получить NOC, что стоит около 5 000 дирхамов, которые обычно оплачивает покупатель. После этого Вы идете в офис доверительного управляющего с покупателем и агентом. Там Вы узнаете цену продажи Вашей доли в собственности в виде чека управляющего от покупателя, и
                                    покупатель обычно оплачивает комиссию за передачу, которая составляет 5 000 дирхамов в случае, если цена недвижимости свыше 500 000 дирхамов и 3 500 дирхамов в случае, если стоимость недвижимости ниже этой цифры. Покупатель также оплачивает 4% от общей стоимости недвижимости в качестве регистрационного сбора в Земельный департамент Дубая.
                                    </p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                МОЖЕТ ЛИ ИНОСТРАНЕЦ ПРИОБРЕСТИ/ВЛАДЕТЬ НЕДВИЖИМОСТЬЮ НА ЭТАПЕ СТРОИТЕЛЬСТВА В ДУБАЕ?
                            </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Лицо любой национальности, независимо от того, проживает ли оно за границей или является резидентом, может приобрести или владеть любой недвижимостью в Дубае. Покупатели и инвесторы не обязаны иметь вид на жительство или аналогичное разрешение для того, чтобы приобрести недвижимость в Дубае.  В число популярных районов Дубая входят Dubai Marina, Downtown Dubai, Jumeirah Village Circle (JVC), International City и Palm Jumeirah. Эти районы
                                    идеально подходят как для новых, так и для существующих покупателей.
                                    </p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                ПОЧЕМУ НЕДВИЖИМОСТЬ НА ЭТАПЕ СТРОИТЕЛЬСТВА В ДУБАЕ ЯВЛЯЕТСЯ ХОРОШЕЙ ИНВЕСТИЦИЕЙ?
                            </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>После того как Вы определили, какое местоположение и тип образа жизни Вам импонирует, Вам необходимо узнать о его преимуществах с точки зрения стоимости недвижимости и возврата инвестиций. Самое лучшее в приобретении недвижимости на этапе строительства в Дубае – это то, что она предлагает быстрый рост стоимости активов, особенно в тех проектах, которые расположены в престижных районах. Если Вы инвестор, то воспользоваться преимуществами сегодняшнего рынка – это крайне мудрое решение. Приобретая недвижимость на этапе строительства сейчас и ожидая подходящего времени для перепродажи Вашей недвижимости, особенно когда на рынке есть  для этого хорошая возможность, Вы точно сможете продать ее по гораздо более высокой цене. Кроме того, покупка проекта на этапе строительства не требует большой суммы денег, так как большинство инвестиций в Дубае в данные проекты предоставляет привлекательные условия оплаты.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeight">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                ЯВЛЯЕТСЯ ЛИ ПОКУПКА НЕДВИЖИМОСТИ НА ЭТАПЕ СТРОИТЕЛЬСТВА ХОРОШЕЙ ИДЕЕЙ ДЛЯ НАЧИНАЮЩИХ ПОКУПАТЕЛЕЙ?
                            </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Покупка недвижимости на этапе строительства позволяет инвесторам приобрести объект по самой низкой цене по сравнению с готовой недвижимостью. Для тех, кто впервые покупает
                                    недвижимость в Дубае, недвижимость на этапе строительства, предлагает отличную возможность с точки зрения возврата инвестиций (ROI), активов, приносящих доход (для
                                    дома для отдыха), а также повышения рыночной стоимости. Данный тип недвижимости предлагает ряд стимулов и преимуществ, позволяющих покупателям, впервые приобретающим недвижимость в Дубае, выйти на современный рынок недвижимости по более доступной цене. Кроме того, застройщики предлагают привлекательные условия оплаты, что облегчает процесс покупателям, впервые приобретающим недвижимость на этапе строительства в Дубае. Если Вы ищете подходящий вариант для инвестиций в недвижимость или дом в будущем, Вы можете просмотреть список объектов недвижимости в Дубае или просто свяжитесь с нами, чтобы узнать больше информации об этих проектах.
                                    </p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingnine">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                МОГУ ЛИ Я ПРОДАТЬ НЕДВИЖИМОСТЬ НА ЭТАПЕ СТРОИТЕЛЬСТВА ДО ДАТЫ ЗАВЕРШЕНИЯ СТРОИТЕЛЬСТВА?
                            </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Да, Вы можете продать недвижимость на этапе строительства до даты завершения строительства в Дубае.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingten">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                КАКОЙ РАЙОН ДУБАЯ ПРЕДЛАГАЕТ ЛУЧШУЮ НЕДВИЖИМОСТЬ НА ЭТАПЕ СТРОИТЕЛЬСТВА?
                            </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>К счастью для инвесторов и потенциальных жильцов, Дубай является домом для сотни доступных и роскошных проектов на этапе строительства. Эти проекты обычно расположены в самых престижных районах города, рядом с известными достопримечательностями, эксцентричными искусственными островами, вдохновленными природой сообществами и космополитическим образом жизни в самом центре Дубая. В городе есть множество престижных мест с проектами на этапе строительства, идеально подходящими для любого образа жизни. Вы можете выбрать один из пляжных районов Bluewaters Island, Dubai Harbour, Jumeirah Bay Island и Palm Jumeirah. Пожить в спокойной обстановке в комплексах Emaar South, Dubai Hills Estate и Al Barari. А если Вы предпочитаете городской образ жизни, городские проекты на этапе строительства доступны в Business Bay, Downtown Dubai и Dubai Marina, и это лишь некоторые из них.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeleven">
                            <button class="accordion-button collapsed" style="    background-color: #000;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                МОЖЕТЕ ЛИ ВЫ ПОЛУЧИТЬ ИПОТЕЧНЫЙ КРЕДИТ НА ПОКУПКУНА ЭТАПЕ СТРОИТЕЛЬСТВА ?
                            </button>
                            </h2>
                            <div id="collapseeleven" class="accordion-collapse collapse" aria-labelledby="headingeleven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Покупка недвижимости на этапе строительства имеет свои собственные уникальные финансовые трудности. Большинство
                                    застройщиков захотят убедиться, что у Вас есть ипотечное финансирование до того, как Вы обменяетесь контрактами. Вам также необходимо будет внести депозит в размере около 5 или 10 процентов. Однако большинство кредиторов держат ипотеку открытой в течение шести месяцев, поэтому, если строительство Вашего дома займет больше времени, Вам придется повторно подавать заявку на получение ипотечного кредита. Если Вы не сможете его получить, то рискуете потерять свой депозит и
                                    придется искать новую недвижимость.
                                    </p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingtwelve">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                ЧТО ТАКОЕ ОСВОБОЖДЕНИЕ ОТ УПЛАТЫ НАЛОГА НА ЗЕМЛЮ?
                            </button>
                            </h2>
                            <div id="collapsetwelve" class="accordion-collapse collapse" aria-labelledby="headingtwelve" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Освобождение от платы за ОДЗ —  это освобождение от платы за ОДЗ, которая взимается при покупке. Сбор DLD составляет 4% от стоимости недвижимости и оплачивается покупателем. Следовательно, отказ от DLD означает, что покупатель не платит этот сбор и вместо этого его оплачивает застройщик.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" style="background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ЧТО ТАКОЕ RERA?
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>RERA расшифровывается как Агентство по регулированию недвижимости и является частью DLD, которое занимается регулированием вопросов в сфере недвижимости в Дубае. Оно отвечает за урегулирование отношений между всеми сторонами
                                    и организует процесс обмена недвижимостью.
                                    </p>
                            </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h3>ЕСЛИ У ВАС ОСТАЛИСЬ ВОПРОСЫ, ПОЖАЛУЙСТА, СВЯЖИТЕСЬ С НАМИ.</h3>

                </div>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                        @csrf

                        <div class="mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                        </div>

                        <div class="mb-4">
                            <textarea name="message" class="form-control" id="textAreaExample" rows="3" placeholder="{{ trans('frontLang.message') }}"></textarea>

                        </div>
                        <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>


            </div>

        </div>
    </section>

@else

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" style="    background-color: #1c1c1c;" type="button"  data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                What is Free Hold Property?
                            </button>
                        </h2>
                        <div id="collapseOne"  class="accordion-collapse collapse" aria-labelledby="headingOne" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>The purchase of property on a freehold basis means that the property is registered in the owner’s name by way of a Title Deed registered in the Dubai Land Department. The owner has the right to sell, lease or rent his/her property at his/her discretion.</p>

                                <p>Areas for freehold properties are designated areas for expatriates, whereas non- freehold property is property limited to UAE Nationals and GCC Nationals.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button  class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What Is DLD?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"  aria-labelledby="headingTwo" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>DLD is the abbreviation for Dubai Land Department. It is the regulatory body by the government that deals with all property and real estate related legislation, organisation, and services for any real estate transactions in Dubai.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What is OFF-Plan?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>An off-plan property alludes to a property whose development is yet to start or is in its primer phases of development.</p>
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfive">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                How to sell an off-plan property in Dubai?
                            </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>You can sell your off plan property after you pay a specific percent of the property value based on your SPA with the property developer. Usually, it is after you pay 30-40% of the property value. Keep in mind that your off plan property in Dubai may have fierce competition in case the developer still has availability since developers run generous property offers these days. If you decide to sell, then check the current market prices of your property, then give it to property experts to sell it for you. -- Sometimes it is worth paying some commission to the property broker to push your property in the real estate market.After you get the right buyer, you go to the developer office to obtain NOC from the developer that costs around 5,000 AED which is usually paid by the buyer. After that, you go to the trustee office with the buyer and agent. There you get the selling price of your shares in the property as a manager cheque from the buyer, and the buyer usually pays the transfer fees that is 5,000 AED in case of the property price over 500,000 AED and 3,500 AED in case the property value below 500,000. The buyer also pays 4% of the total property value as registration fees to Dubai Land Department.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                Can a foreigner purchase/own an off-plan property in Dubai?
                            </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Any person of any nationality, whether based overseas or a resident can purchase or own in any freehold properties in Dubai. Buyers and investors are not required to hold any type of residency or similar permit in order to buy an off-plan property in Dubai. Popular freehold areas in Dubai include Dubai Marina, Downtown Dubai, Jumeirah Village Circle (JVC), International City, and Palm Jumeirah. These locations are ideal to both new and existing property buyers.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                Why is off-plan property in Dubai a good investment?
                            </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Once you have identified which location and type of lifestyle you require, being aware of its benefits in terms of property value and return on investments is a must. The best thing about purchasing an off-plan property in Dubai is that it offers quick asset value appreciation especially those projects located in prime areas. If you are an investor, taking advantage of today’s market is a wise decision. By purchasing an off-plan now and wait for the right time to exit or resale your property especially when there is a good opportunity in the market, then you can definitely sell it at a much higher price. Furthermore, buying an the off-plan project does not require a large amount of money as most off-plan investments in Dubai comes with attractive payment terms and deals.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeight">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                Is buying an off-plan a good idea for first-time buyers?
                            </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Buying an off-plan property allows investors to acquire a unit at its lowest price compared to ready properties. For first time buyers, off-plan properties for sale in Dubai offers a great opportunity in terms of return on investments (ROI), income-producing assets (for holiday home), and market value appreciation. These type of properties offers a number of incentives and benefits allowing first-time buyers to enter today’s Dubai real estate market at a more affordable price. Also, real estate developers offer attractive payment terms, making it easier for first-time buyers to avail off-plan properties in Dubai.If you are looking for the right property investment or a home in the future, you can browse on the list of off-plan properties in Dubai or simply get in touch with us to find out more information about these projects.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingnine">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                Can I sell an off plan property before its completion date?
                            </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Yes, you can sell off plan property before the completion date in Dubai.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingten">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                Which area in Dubai Offers the best off-plan property?
                            </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Fortunately for investors and end-users, Dubai is home to hundreds of affordable and luxury off-plan projects. These developments are usually located across the city’s most prestigious destinations, close to famous landmarks, eccentric man-made islands, nature-inspired communities, and cosmopolitan living right in the center of Dubai. The city has a lot of prime locations with off-plan projects ideal for your lifestyle needs. You can choose from beachfront communities at Bluewaters Island, Dubai Harbour, Jumeirah Bay Island, and Palm Jumeirah for example. Live on a tranquil environment setup at Emaar South, Dubai Hills Estate, and Al Barari. Or if you prefer a city lifestyle, urban off-plan projects are available in Business Bay, Downtown Dubai and Dubai Marina just to name a few.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeleven">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                Can you get a mortgage on off plan?
                            </button>
                            </h2>
                            <div id="collapseeleven" class="accordion-collapse collapse" aria-labelledby="headingeleven" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>Buying off-plan has its own unique financial challenges. Most developers will want to see that you have mortgage finance in place before you exchange contracts. You will also need to pay a deposit of about 5 or 10 per cent at exchange. However, most lenders will only hold mortgages open for six months so if your property takes longer than that to build then you face having to reapply for a mortgage later on. If you can’t get one you could then lose your deposit and have to start looking for a new property</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingtwelve">
                            <button class="accordion-button collapsed" style="    background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                What is DLD Fee Waiver?
                            </button>
                            </h2>
                            <div id="collapsetwelve" class="accordion-collapse collapse" aria-labelledby="headingtwelve" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>A DLD Waiver is the waiver of the DLD fee that is levied on property purchase. The DLD Fee is 4% of the property value and is payable by the buyer. Ergo a DLD Waiver means the buyer does not pay this fee and it is instead paid by the developer.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" style="background-color: #1c1c1c;" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What is RERA Dubai?
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-mdb-parent="#accordionExample" >
                            <div class="accordion-body">
                                <p>RERA stands for Real Estate Regulatory Agency and is part of the DLD that takes care of the regulations in the real estate industry in Dubai. It is in charge of handling relationship between all parties of a contract and organises the exchange process of the properties.</p>
                            </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h3>If You Have a Still Question Please Contact us.</h3>

                </div>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                        @csrf

                        <div class="mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                        </div>

                        <div class="mb-4">
                            <textarea name="message" class="form-control" id="textAreaExample" rows="3" placeholder="{{ trans('frontLang.message') }}"></textarea>

                        </div>
                        <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>


            </div>

        </div>
    </section>

@endif




@endsection
