<style>
  p{
    line-height: 1.6 !important;
  }
</style>
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

@section('meta_detail')

    <title> Terms And Condtions | Best Real Estate Agency in Dubai </title>
    <meta name="description" content=" We are the Experienced &amp; Qualified Dubai Real Estate Agency in Dubai. we can assist you to Buy, Sell leasing , Renting and Mortgage properties in Dubai. "/>
    <meta name="keywords" content=" careers, hiring, jobs in Dubai , "/>

@endsection
@section('content')

<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.Termsandcondition') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>

@if ( $langSeg == 'ar' )

<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.Termsandcondition') }}</h3>
        <P>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use,which together with our privacy policy govern

        <p style="font-size: 16px;line-height: 30px;">
            The use of this website is subject to the following terms of use:
             </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The content of the pages of this website is for your general information and use only. It is subject to change without notice.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The information contained on this website is not intended to and does not constitute an offer, solicitation, inducement, invitation or commitment to purchase, subscribe to, provide or sell or lease properties or to provide any recommendations on which visitors to this website should rely for financial, investment or other advice or to take any decision based on such information. Visitors to this website are encouraged to seek individual advice from their legal, financial, personal, and other advisers before making any investment or financial decision or purchasing or leasing any property, asset, or real estate related product.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any property, investment, asset, services, or information available through this website meet your specific requirements.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Unless otherwise expressly noted, all content included on this website, including, without limitation, images, logos, articles, and other materials, are protected by copyrights and other intellectual property owned, controlled or licensed by Edge Realty. All trademarks and logos displayed on this website are the property of their respective owners, who may or may not be affiliated with Edge Realty. Visitors are responsible for complying with all applicable copyright, trademark and other applicable laws. We allow visitors to make copies of this website as necessary incidental acts during their viewing of the website. Visitors can print, for their personal use, as much of the website as is reasonable for private purposes. All other use is strictly prohibited.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offense.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * This website includes statements that are, or may be deemed to be, “forward-looking statements.” These forward-looking statements can be identified by the use of forward-looking terminology, including the terms “believes”, “estimates”, “anticipates”, “expects”, “intends”, “may”, “will” or “should” or, in each case, their negative or other variations or comparable terminology. These forward-looking statements include all matters that are not historical facts. They may appear in several places throughout this website and include statements regarding the intentions, beliefs or current expectations of Edge Realty concerning, among other things, the investment performance, results of operations, financial condition, liquidity and prospects of Edge Realty. By their nature, forward-looking statements involve risks and uncertainties because they relate to events and depend on circumstances that may or may not occur in the future. Forward-looking statements are not guarantees of future performance. Actual investment performance, results of operations, return on investments, timely completion of development or projects may differ materially from the impression created by the forward-looking statements contained on this website. Edge Realty does not undertake to update any of these forward-looking statements.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * To the maximum extent permitted by applicable law and regulatory requirements, Edge Realty specifically disclaims any liability for errors, inaccuracies or omissions on this website and for any loss (whether direct or indirect) or damage resulting from its use, whether caused by negligence or otherwise. Visitors are responsible for compliance with all local laws and regulations.



        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Your use of this website and any dispute arising out of such use of the website is subject to the laws of the United Arab Emirates.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Our failure to insist upon strict enforcement of any provision of these terms and conditions will not constitute a waiver of any provision or right. Any legal action or proceeding between you and us related to these terms and conditions will be brought exclusively in a court of competent jurisdiction in Dubai, United Arab Emirates.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The logos, images (artistic and photos) have been used solely for the purpose of reference to the original brand, company, builder, developer only to provide a perspective to the website user and does not associate the website or its owners, affiliates, vendors and employees to any of the brands mentioned in the website in any way whatsoever.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * No warranties of any kind, implied, express or statutory, including but not limited to the warranties of non-infringement of third party rights, title, merchantability, fitness for a particular purpose and freedom from computer virus, are given in conjunction with the information and materials.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * In no event will Edge Realtyliable for any damages, including without limitation direct or indirect, special, incidental, or consequential damages, losses or expenses arising in connection with the Site or use thereof or inability to use by any party or reliance on the contents of the Site, or in connection with any failure of performance, error, omission, interruption, defect, delay or failure in operation or transmission, computer virus or line or system failure, even if Edge Realty, its representatives, are advised of the possibility of such damages, losses or expense, hyperlinks to other internet resources are at your own risk; the content, accuracy, opinions expressed, and other links provided by these resources are not investigated, verified, monitored, or endorsed by Edge Realty. This Exclusion clause shall take effect to the fullest extent permitted by all applicable law.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * All information submitted to Edge Realty via the Site shall be deemed and remain the property of Edge Realty who shall be free to use, for any purpose, any ideas, concepts, know-how or techniques contained in information a visitor to the Site provides


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Should you have any objections to the content posted on this website you are requested to write to info@edgerealty.ae  with the subject: ‘content request clarification’ along with your name, address and telephone / mobile number and we will respond as soon as possible.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * By accessing the Site and obtaining the facilities, products or services offered through the Site, you agree that all applicable law of Dubai and the United Arab Emirates (UAE) shall govern such access and the provision of such facilities, products and services and you agree to submit to the exclusive jurisdiction of the courts of the Emirate of Dubai, UAE.
        </p>

    </div>
    </div>




</section>

@elseif ( $langSeg == 'ru' )


<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.Termsandcondition') }}</h3>
        <P>Добро пожаловать на наш сайт. Если Вы продолжаете просматривать и использовать этот сайт, Вы соглашаетесь соблюдать и быть связанными следующими положениями и условиями использования, которые вместе с нашей политикой конфиденциальности регулируют использование данного сайта:

        <p style="font-size: 16px;line-height: 30px;">
            The use of this website is subject to the following terms of use:
             </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Содержание страниц этого сайта предназначено для ознакомительных целей. Оно может быть изменено без предварительного уведомления.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Информация, содержащаяся на этом сайте, не предназначена и
            не является предложением, ходатайством, побуждением, приглашением или обязательством купить, подписаться, предоставить, продать или арендовать недвижимость или предоставить какие-либо рекомендации, на которые посетители данного сайта должны полагаться в финансовых, инвестиционных целях.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Посетителям данного сайта рекомендуется обращаться за индивидуальной консультацией к своим юридическим, финансовым,
            личным и другим консультантов, прежде чем принимать какие-либо инвестиционные или финансовые решения, покупать или арендовать какую-либо собственность, активы или продукты, связанные с недвижимостью.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Ни мы, ни третьи лица не предоставляем никаких гарантий в отношении точности, своевременности, производительности, полноты или пригодности информации и материалов, найденных или предложенных на этом сайте для какой-либо конкретной цели. Вы признаете, что такая информация и материалы могут содержать неточности или ошибки, и мы прямо исключаем ответственность за любые такие неточности или ошибки в полной мере, разрешенной законом.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            *   Вы используете любую информацию или материалы на этом сайте исключительно на Ваш собственный риск, за который мы не несем ответственности.
            Вы несете собственную ответственность за обеспечение того, чтобы любая собственность, инвестиции, активы, услуги или информация, доступные через этот сайт, соответствовали Вашим конкретным требованиям.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            *   Если иное прямо не указано, все содержимое на этом
            сайте, включая изображения, логотипы, статьи и другие материалы, защищены авторскими правами и другой интеллектуальной
            собственностью, принадлежащей, контролируемой или лицензированной Edge Realty.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Посетители несут ответственность за соблюдение всех применимых законов об авторском праве, товарных знаках и других применимых законов. Мы разрешаем посетителям делать копии
            данного веб-сайта в качестве необходимых случайных действий во время их просмотра.  Посетители могут распечатывать для личного пользования столько частей сайта, сколько это целесообразно. Любое другое использование сайта строго запрещено.



        </p>
        <p style="font-size: 16px;line-height: 30px;">
            *   Несанкционированное использование данного веб-сайта может послужить основанием для предъявления претензий за
            возмещения убытков и/или быть уголовным преступлением.
              Данный сайт содержит заявления, которые являются или могут считаться "заявлениями прогнозного характера". Эти прогнозные заявления можно определить по использованию терминологии прогнозирования, включая термины "считает", "оценивает", "ожидает","намеревается", "может", "будет" или "должен" или, в каждом случае, их отрицательные или другие вариации или сопоставимую терминологию. Эти прогнозные заявления включают в себя все вопросы, которые не являются историческими фактами. Они могут появляться в нескольких местах на этом сайте и включают заявления относительно намерений, убеждений или текущих ожиданий Edge Realty относительно, среди прочего,
            инвестиционных показателей, результатов деятельности,


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * финансового состояния, ликвидности и перспектив Edge Realty. По своей природе прогнозные заявления связаны с рисками и неопределенностью, поскольку они относятся к будущим событиям и зависят от обстоятельств, которые могут или не могут
            произойти в будущем. Прогнозные заявления не являются гарантией
            будущих показателей. Фактическая эффективность инвестиций, результаты операций, доходность инвестиций, своевременное завершение застройки или проектов могут существенно отличаться от впечатления, создаваемого заявлениями прогнозного характера, содержащимися на данном сайте.  Edge Realty не не обязуется обновлять какие-либо из этих прогнозных заявлений.




        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Время от времени данный веб-сайт может также содержать ссылки на другие веб-сайты. Эти ссылки расположены для Вашего удобства, чтобы предоставить дополнительную информацию. Они не означают, что мы одобряем данный(е) сайт(ы). Мы не несем ответственности за содержание сайтов, на которые ведут ссылки.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * В максимальной степени, разрешенной действующим законодательством и нормативными требованиями, Edge Realty снимает с себя всякую ответственность за ошибки, неточности или упущения на этом сайте и за любые убытки (прямые или косвенные) или ущерб, возникший в результате его использования, вызванный небрежностью или иным образом. Посетители несут ответственность за соблюдение всех местных законов и правил.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Использование Вами данного сайта и любые споры, возникающие в связи с таким использованием, подчиняются законам Объединенных Арабских Эмиратов.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Наша неспособность настаивать на строгом выполнении любого пункта настоящих положений и условий не будет означать отказ от какого-либо положения или права. Любые юридические действия или разбирательства между Вами и нами, связанные с настоящими положениями и условиями, будут рассматриваться исключительно в
            суде компетентной юрисдикции в Дубае, Объединенных Арабских Эмиратов.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            *   Логотипы, изображения (художественные и фото) были использованы исключительно с целью ссылки на оригинальный бренд, компанию, застройщика, только для того, чтобы дать представление о нем пользователю сайта, и не ассоциируются с сайтом или его владельцами, аффилированных лиц, поставщиков и
            сотрудников с какими-либо брендами, упомянутыми на сайте каким бы то ни было образом.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Никаких гарантий любого рода, подразумеваемых, явных или установленных законом, включая, но не ограничиваясь гарантиями ненарушения прав третьих лиц, права собственности, товарного состояния, пригодности для конкретной цели и отсутствие компьютерных вирусов, предоставляются в связи с
            информацией и материалами.



        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Ни при каких обстоятельствах Edge Realty не несет ответственности за любой ущерб, включая прямые или косвенные, специальные, случайные убытки, потери или расходы, возникающие в связи с
            сайтом, его использованием или невозможностью его использования любой стороной или полагаясь на содержимое сайта, или в связи с любым сбоем в производительности, ошибкой, упущением, прерыванием, дефектом, задержкой или сбоем в работе или передаче, компьютерным вирусом или сбоем линии или системы, даже если Edge Realty, ее представители, предупреждены о
            возможности таких убытков, потерь или расходов. Гиперссылки на другие интернет-ресурсы, содержание, точность, выраженные мнения и другие ссылки, предоставленные этими ресурсами,  не исследуются, не проверяются, не контролируются и не одобряются Edge Realty.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Данное положение об исключении вступает в силу в максимальной степени, разрешенной всем применимым законодательством.
            Вся информация, предоставленная Edge Realty через сайт, должна,
          считается и остается собственностью Edge Realty, которая может свободно использовать в любых целях любые идеи, концепции, ноу-хау или методики, содержащиеся в информации, предоставленной посетителем сайта.
            Если у Вас есть какие-либо возражения по поводу содержания, размещенного на данном сайте, просим Вас написать на электронный адрес info@edgerealty.ae с темой письма:
          'Запрос на разъяснение содержания' вместе с Вашим именем, адресом и номером телефона/мобильного телефона, и мы Вам ответим в кратчайшие сроки.
            Заходя на сайт и получая возможности, продукты или услуги, предлагаемые через сайт, Вы соглашаетесь с тем, что все применимые законы Дубая и Объединенных Арабских Эмиратов (ОАЭ) регулирует такой доступ и предоставление таких объектов, продуктов и услуг, и Вы соглашаетесь подчиняться исключительной юрисдикции судов эмирата Дубай, ОАЭ.

        </p>

    </div>
    </div>




</section>

@else

<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.Termsandcondition') }}</h3>
        <P>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use,which together with our privacy policy govern

        <p style="font-size: 16px;line-height: 30px;">
            The use of this website is subject to the following terms of use:
             </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The content of the pages of this website is for your general information and use only. It is subject to change without notice.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The information contained on this website is not intended to and does not constitute an offer, solicitation, inducement, invitation or commitment to purchase, subscribe to, provide or sell or lease properties or to provide any recommendations on which visitors to this website should rely for financial, investment or other advice or to take any decision based on such information. Visitors to this website are encouraged to seek individual advice from their legal, financial, personal, and other advisers before making any investment or financial decision or purchasing or leasing any property, asset, or real estate related product.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any property, investment, asset, services, or information available through this website meet your specific requirements.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Unless otherwise expressly noted, all content included on this website, including, without limitation, images, logos, articles, and other materials, are protected by copyrights and other intellectual property owned, controlled or licensed by Edge Realty. All trademarks and logos displayed on this website are the property of their respective owners, who may or may not be affiliated with Edge Realty. Visitors are responsible for complying with all applicable copyright, trademark and other applicable laws. We allow visitors to make copies of this website as necessary incidental acts during their viewing of the website. Visitors can print, for their personal use, as much of the website as is reasonable for private purposes. All other use is strictly prohibited.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offense.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * This website includes statements that are, or may be deemed to be, “forward-looking statements.” These forward-looking statements can be identified by the use of forward-looking terminology, including the terms “believes”, “estimates”, “anticipates”, “expects”, “intends”, “may”, “will” or “should” or, in each case, their negative or other variations or comparable terminology. These forward-looking statements include all matters that are not historical facts. They may appear in several places throughout this website and include statements regarding the intentions, beliefs or current expectations of Edge Realty concerning, among other things, the investment performance, results of operations, financial condition, liquidity and prospects of Edge Realty. By their nature, forward-looking statements involve risks and uncertainties because they relate to events and depend on circumstances that may or may not occur in the future. Forward-looking statements are not guarantees of future performance. Actual investment performance, results of operations, return on investments, timely completion of development or projects may differ materially from the impression created by the forward-looking statements contained on this website. Edge Realty does not undertake to update any of these forward-looking statements.


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * To the maximum extent permitted by applicable law and regulatory requirements, Edge Realty specifically disclaims any liability for errors, inaccuracies or omissions on this website and for any loss (whether direct or indirect) or damage resulting from its use, whether caused by negligence or otherwise. Visitors are responsible for compliance with all local laws and regulations.



        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Your use of this website and any dispute arising out of such use of the website is subject to the laws of the United Arab Emirates.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Our failure to insist upon strict enforcement of any provision of these terms and conditions will not constitute a waiver of any provision or right. Any legal action or proceeding between you and us related to these terms and conditions will be brought exclusively in a court of competent jurisdiction in Dubai, United Arab Emirates.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * The logos, images (artistic and photos) have been used solely for the purpose of reference to the original brand, company, builder, developer only to provide a perspective to the website user and does not associate the website or its owners, affiliates, vendors and employees to any of the brands mentioned in the website in any way whatsoever.
        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * No warranties of any kind, implied, express or statutory, including but not limited to the warranties of non-infringement of third party rights, title, merchantability, fitness for a particular purpose and freedom from computer virus, are given in conjunction with the information and materials.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * In no event will Edge Realtyliable for any damages, including without limitation direct or indirect, special, incidental, or consequential damages, losses or expenses arising in connection with the Site or use thereof or inability to use by any party or reliance on the contents of the Site, or in connection with any failure of performance, error, omission, interruption, defect, delay or failure in operation or transmission, computer virus or line or system failure, even if Edge Realty, its representatives, are advised of the possibility of such damages, losses or expense, hyperlinks to other internet resources are at your own risk; the content, accuracy, opinions expressed, and other links provided by these resources are not investigated, verified, monitored, or endorsed by Edge Realty. This Exclusion clause shall take effect to the fullest extent permitted by all applicable law.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * All information submitted to Edge Realty via the Site shall be deemed and remain the property of Edge Realty who shall be free to use, for any purpose, any ideas, concepts, know-how or techniques contained in information a visitor to the Site provides


        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * Should you have any objections to the content posted on this website you are requested to write to info@edgerealty.ae  with the subject: ‘content request clarification’ along with your name, address and telephone / mobile number and we will respond as soon as possible.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            * By accessing the Site and obtaining the facilities, products or services offered through the Site, you agree that all applicable law of Dubai and the United Arab Emirates (UAE) shall govern such access and the provision of such facilities, products and services and you agree to submit to the exclusive jurisdiction of the courts of the Emirate of Dubai, UAE.
        </p>

    </div>
    </div>




</section>


@endif







<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


            </div>



        </div>

    </div>
</section>



@endsection
