<?php

use App\Http\Controllers\Fronthomecontroller;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',"FronthomeController@index")->name('home-page');

Route::get('/ar',"FronthomeController@Homepage");

Route::get('/ru',"FronthomeController@Homepage");

Route::get('/en',"FronthomeController@Homepage");


Route::get('/public/home', function () {
    return redirect('/home');
});


Route::get('/home',"FronthomeController@index");


Route::get('/{lang?}/home', 'FronthomeController@index')->name('HomePageByLang');


// Search
Route::get('/en/autocomplete', 'FronthomeController@autocomplete');

// Search
Route::post('/fetch', 'FronthomeController@fetch');

Route::post('/fetch_dld', 'FronthomeController@fetch_dld');

Route::post('/fetch-arabic', 'FronthomeController@fetch_arabic');



Route::post('/{lang?}/properties_search', 'PropertiesController@properties_search');

Route::post('/{lang?}/properties_search', 'PropertiesController@properties_search');

Route::post('/{lang?}/properties_search_ar', 'PropertiesController@properties_search_arabic');

Route::get('/{lang?}/properties_search_ar', 'PropertiesController@properties_search_arabic');

Route::get('/{lang?}/properties_search', 'PropertiesController@properties_search');

Route::post('/{lang?}/offplan_search', 'ProjectController@offplan_search');

Route::get('/{lang?}/offplan_search', 'ProjectController@offplan_search');

Route::post('/{lang?}/offplan_search_ar', 'ProjectController@offplan_search_ar');

Route::get('/{lang?}/offplan_search_ar', 'ProjectController@offplan_search_ar');

// aboutus

Route::get('/{lang?}/aboutus','FronthomeController@aboutus');

Route::get('/{lang?}/team','FronthomeController@team');

Route::get('/{lang?}/blogs','BlogsController@index');

Route::get('/{lang?}/blogs_detail/{id}','BlogsController@detail');

Route::get('/{lang?}/agent_detail/{id}','FronthomeController@team_detail');

Route::get('/{lang?}/services','FronthomeController@services');

Route::get('/{lang?}/thankyou','FronthomeController@thankyou');

Route::get('/{lang?}/rate-our-service', 'FrontendHomeController@feedback')->name('feedBack');


//mortgage

Route::get('/{lang?}/book-a-viewing','FronthomeController@book_a_viewing');

//sell

Route::get('/{lang?}/sell','FronthomeController@sell');

//mortgage

Route::get('/{lang?}/mortgage','FronthomeController@mortgage');

//  career
Route::get('/{lang}/career','FronthomeController@career');

//  Faqs
Route::get('/{lang}/faqs','FronthomeController@faqs');

//  Online Payment
Route::get('/{lang}/onlinepayments','FronthomeController@onlinepayments');


//  SiteMap
Route::get('/{lang}/sitemap','FronthomeController@sitemap');


//  Terms & Conditions
Route::get('/{lang}/termsandconditions','FronthomeController@termsandconditions');

//  Terms & Conditions
Route::get('/{lang}/privacyandpolicy','FronthomeController@privacyandpolicy');


//  contact us
Route::get('/{lang}/contactus','FronthomeController@contactus');


//  sale transcation
Route::get('/{lang}/sale_transaction','FronthomeController@sale_transaction');

Route::post('/{lang}/sale_transaction_search','FronthomeController@sale_transaction_search');

//  valuation
Route::get('/valuation','FronthomeController@valuation');


//  invoice
Route::post('/check-your-invoice-submit', 'FronthomeController@find_invoice');

Route::get('/{lang}/invoice', 'FronthomeController@check_invoice');

Route::get('/invoice', 'FronthomeController@check_invoice');





// Form Submition Routes


Route::post('/request_detail_project/submit','FronthomeController@request_detail_project');

Route::post('/request_detail_project_detail/submit','FronthomeController@request_detail_project_detail');

Route::post('/request_detail_property/submit','FronthomeController@request_detail_property');

Route::post('/request_detail_community/submit','FronthomeController@request_detail_community');

Route::post('/contactus/submit','FronthomeController@contactus_email');

Route::post('/mortgage/submit','FronthomeController@mortgage_email');

Route::post('/career/submit','FronthomeController@career_email');

Route::post('/project_document/submit','FronthomeController@project_documentSubmit');

Route::post('/book_view/submit','FronthomeController@book_view_email');

Route::post('/book_viewing/submit','FronthomeController@book_viewing_email');

Route::post('/request_detail/submit','FronthomeController@request_detail');

Route::post('/book_valuation/submit','FronthomeController@book_valuation_email');



// Projects Route

Route::get('/{lang}/dubai-new-projects',"ProjectController@index");

Route::get('/{lang}/dubai-new-projects/{id}',"ProjectController@detail");

Route::get('/{lang}/dubai-ready-projects/{id}',"ProjectController@ready_detail");

Route::get('/{lang}/dubai-ready-projects',"ProjectController@ready_projects");



Route::get('/{lang}/dubai-luxury-projects',"ProjectController@luxury_projects");

Route::get('/{lang}/dubai-luxury-projects/{id}',"ProjectController@luxury_project_detail");



// Projects type Route

Route::get('/{lang}/dubai-new-projects-apartment',"ProjectController@apartment");

Route::get('/{lang}/dubai-new-projects-villas',"ProjectController@villas");

Route::get('/{lang}/dubai-new-projects-townhouses',"ProjectController@townhouses");

Route::get('/{lang}/dubai-new-projects-plots',"ProjectController@plot");





// Properties Route

Route::get('/{lang}/dubai-property',"PropertiesController@index");

Route::get('/{lang}/dubai-property/{id}',"PropertiesController@detail");

Route::get('/{lang}/dubai-properties/sale/apartment-for-sale-in-Dubai',"PropertiesController@apartment_for_sale");

Route::get('/{lang}/dubai-properties/sale/villas-for-sale-in-Dubai',"PropertiesController@villas_for_sale");

Route::get('/{lang}/dubai-properties/sale/commercial-for-sale-in-Dubai',"PropertiesController@commercial_for_sale");

Route::get('/{lang}/dubai-properties/sale/townhouses-for-sale-in-Dubai',"PropertiesController@townhouses_for_sale");

Route::get('/{lang}/dubai-properties/sale/furnished-properties-for-sale-Dubai',"PropertiesController@furnished_properties_for_sale");

Route::get('/{lang}/dubai-properties/sale/plots-for-sale-in-Dubai',"PropertiesController@plots_for_sale");
// Properties for rent

Route::get('/{lang}/dubai-properties/rent/apartment-for-rent-in-Dubai',"PropertiesController@apartment_for_rent");

Route::get('/{lang}/dubai-properties/rent/villas-for-rent-in-Dubai',"PropertiesController@villas_for_rent");

Route::get('/{lang}/dubai-properties/rent/commercial-for-rent-in-Dubai',"PropertiesController@commercial_for_rent");

Route::get('/{lang}/dubai-properties/rent/townhouses-for-rent-in-Dubai',"PropertiesController@townhouses_for_rent");

Route::get('/{lang}/dubai-properties/rent/furnished-properties-for-rent-Dubai',"PropertiesController@furnished_properties_for_rent");

Route::get('/{lang}/dubai-properties/rent/luxury-properties-for-rent-in-Dubai',"PropertiesController@luxury_properties_for_rent");


//Communities Route

Route::get('/{lang}/dubai-communities',"CommunitiesController@index");

Route::get('/{lang}/dubai-communities/{id}',"CommunitiesController@detail");

// Developer Routes

Route::get('/{lang}/dubai-developers',"DeveloperController@index");

Route::get('/{lang}/dubai-developers/{id}',"DeveloperController@detail");

Auth::routes();


Route::get('/logout', function () {

    Auth::logout();

    return redirect('/login');

    })->name('logout');



Route::get('/admin', 'HomeController@index');

//Contact us form

Route::post('contactus', 'MailController@send_email')->name('homeform');

Route::post('project_email', 'MailController@send_email_project')->name('projectform');

Route::post('community_email', 'MailController@send_email_community')->name('communityform');

Route::post('developer_email', 'MailController@send_email_developer')->name('developerform');

Route::post('contactus_email', 'MailController@contactus')->name('contactus');

Route::post('valuation_email', 'MailController@valuation_email')->name('valuation');



// Properties backend route properties

Route::get('admin/properties/show', 'PropertiesController@showindex')->name('propertyView');

Route::get('admin/properties/create', 'PropertiesController@create')->name('propertyCreate');

Route::post('admin/properties/store', 'PropertiesController@store')->name('propertyStore');

Route::get('admin/properties/view/{id}', 'PropertiesController@show')->name('propertyViewbyid');

Route::get('admin/properties/edit/{id}', 'PropertiesController@edit')->name('propertyEdit');

Route::post('admin/properties/update/{id}', 'PropertiesController@update')->name('propertyUpdate');

Route::get('admin/properties/destroy/{id}','PropertiesController@destroy')->name('propertyDestroy');


// Properties backend route projects

Route::get('admin/projects/show', 'ProjectController@showindex')->name('projectView');

Route::get('admin/projects/create', 'ProjectController@create')->name('projectCreate');

Route::post('admin/projects/store', 'ProjectController@store')->name('projectStore');

Route::get('admin/projects/{id}/view', 'ProjectController@show')->name('projectViewbyid');

Route::get('admin/projects/edit/{id}', 'ProjectController@edit')->name('projectEdit');

Route::post('admin/projects/update/{id}', 'ProjectController@update')->name('projectUpdate');

Route::get('admin/projects/destroy/{id}','ProjectController@destroy')->name('projectDestroy');

Route::get('admin/project_images/delete_image/{prop_id}/{id}', 'ProjectImageController@delete_image');

//Project Search
Route::post('search', 'FronthomeController@searchbyproject')->name('searchbyproject');





//Invoice


Route::get('admin/invoice/create', 'InvoicesController@create')->name('invoiceCreate');

Route::get('admin/invoice/show', 'InvoicesController@index')->name('invoice');

Route::post('admin/invoice/store', 'InvoicesController@store')->name('invoiceStore');

Route::get('admin/invoice/edit/{id}', 'InvoicesController@edit')->name('invoiceEdit');

Route::post('admin/invoice/update/{id}', 'InvoicesController@update')->name('invoiceUpdate');




// Communities backend route projects

Route::get('admin/communities/show', 'CommunitiesController@showindex')->name('CommunitiesView');

Route::get('admin/communities/create', 'CommunitiesController@create')->name('CommunitiesCreate');

Route::post('admin/communities/store', 'CommunitiesController@store')->name('CommunitiesStore');

Route::get('admin/communities/view/{id}', 'CommunitiesController@show')->name('CommunitiesViewbyid');

Route::get('admin/communities/edit/{id}', 'CommunitiesController@edit')->name('CommunitiesEdit');

Route::post('admin/communities/update/{id}', 'CommunitiesController@update')->name('CommunitiesUpdate');

Route::get('admin/communities/destroy/{id}','CommunitiesController@destroy')->name('CommunitiesDestroy');


// Developer backend route

Route::get('admin/developer/show', 'DeveloperController@showindex')->name('developerView');

Route::get('admin/developer/create', 'DeveloperController@create')->name('developerCreate');

Route::post('admin/developer/store', 'DeveloperController@store')->name('developerStore');

Route::get('admin/developer/view/{id}', 'DeveloperController@show')->name('developerViewbyid');

Route::get('admin/developer/edit/{id}', 'DeveloperController@edit')->name('developerEdit');

Route::post('admin/developer/update/{id}', 'DeveloperController@update')->name('developerUpdate');

Route::get('admin/developer/destroy/{id}','DeveloperController@destroy')->name('developerDestroy');


// Blogs backend route

Route::get('admin/blogs/show', 'BlogsController@showindex')->name('blogsView');

Route::get('admin/blogs/create', 'BlogsController@create')->name('blogsCreate');

Route::post('admin/blogs/store', 'BlogsController@store')->name('blogsStore');

Route::get('admin/blogs/view/{id}', 'BlogsController@show')->name('blogsViewbyid');

Route::get('admin/blogs/edit/{id}', 'BlogsController@edit')->name('blogsEdit');

Route::post('admin/blogs/update/{id}', 'BlogsController@update')->name('blogsUpdate');

Route::get('admin/blogs/destroy/{id}','BlogsController@destroy')->name('blogsDestroy');




// Agents backend route

Route::get('admin/agents/show', 'AgentsController@showindex')->name('agentsView');

Route::get('admin/agents/create', 'AgentsController@create')->name('agentsCreate');

Route::post('admin/agents/store', 'AgentsController@store')->name('agentsStore');

Route::get('admin/agents/{id}/view', 'AgentsController@show')->name('agentsViewbyid');

Route::get('admin/agents/edit/{id}', 'AgentsController@edit')->name('agentsEdit');

Route::post('admin/agents/update/{id}', 'AgentsController@update')->name('agentsUpdate');

Route::get('admin/agents/destroy/{id}','AgentsController@destroy')->name('agentsDestroy');

Route::get('admin/agents/properties/{id}','AgentsController@properties')->name('agentsProperties');

Route::get('admin/agents/properties/unlist/{id}','AgentsController@properties_unlist')->name('agentsPropertiesUnlist');

Route::post('admin/agents/properties/add-listing','AgentsController@properties_list')->name('agentsPropertiesList');

// Aminites backend route

Route::get('admin/aminites/show', 'AminitesController@showindex')->name('aminitiesView');

Route::get('admin/aminites/create', 'AminitesController@create')->name('aminitiesCreate');

Route::post('admin/aminites/store', 'AminitesController@store')->name('aminitiesStore');

Route::get('admin/aminites/{id}/view', 'AminitesController@show')->name('aminitiesViewbyid');

Route::get('admin/aminites/edit/{id}', 'AminitesController@edit')->name('aminitiesEdit');

Route::post('admin/aminites/update/{id}', 'AminitesController@update')->name('aminitiesUpdate');

Route::get('admin/aminites/destroy/{id}','AminitesController@destroy')->name('aminitiesDestroy');


// Types backend route

Route::get('admin/types/show', 'TypesController@showindex')->name('typesView');

Route::get('admin/types/create', 'TypesController@create')->name('typesCreate');

Route::post('admin/types/store', 'TypesController@store')->name('typesStore');

Route::get('admin/types/{id}/view', 'TypesController@show')->name('typesViewbyid');

Route::get('admin/types/edit/{id}', 'TypesController@edit')->name('typesEdit');

Route::post('admin/types//update/{id}', 'TypesController@update')->name('typesUpdate');

Route::get('admin/types/destroy/{id}','TypesController@destroy')->name('typesDestroy');


// Feature backend route

Route::get('admin/features/show', 'FeatureController@showindex')->name('featureView');

Route::get('admin/features/create', 'FeatureController@create')->name('featureCreate');

Route::post('admin/features/store', 'FeatureController@store')->name('featureStore');

Route::get('admin/features/{id}/view', 'FeatureController@show')->name('featureViewbyid');

Route::get('admin/features/edit/{id}', 'FeatureController@edit')->name('featureEdit');

Route::post('admin/features/update/{id}', 'FeatureController@update')->name('featureUpdate');

Route::get('admin/features/destroy/{id}','FeatureController@destroy')->name('featureDestroy');


// Cities backend route

Route::get('admin/cities/show', 'CityController@showindex')->name('citiesView');

Route::get('admin/cities/create', 'CityController@create')->name('citiesCreate');

Route::post('admin/cities/store', 'CityController@store')->name('citiesStore');

Route::get('admin/cities/{id}/view', 'CityController@show')->name('citiesViewbyid');

Route::get('admin/cities/edit/{id}', 'CityController@edit')->name('citiesEdit');

Route::post('admin/cities//update/{id}', 'CityController@update')->name('citiesUpdate');

Route::get('admin/cities/destroy/{id}','CityController@destroy')->name('citiesDestroy');


// Cities backend route

Route::get('admin/location/show', 'LocationController@showindex')->name('locationView');

Route::get('admin/location/create', 'LocationController@create')->name('locationCreate');

Route::post('admin/location/store', 'LocationController@store')->name('locationStore');

Route::get('admin/location/{id}/view', 'LocationController@show')->name('locationViewbyid');

Route::get('admin/location/edit/{id}', 'LocationController@edit')->name('locationEdit');

Route::post('admin/location/update/{id}', 'LocationController@update')->name('locationUpdate');

Route::get('admin/location/destroy/{id}','LocationController@destroy')->name('locationDestroy');



// Project type  backend route

Route::get('admin/project_type/show', 'Project_typeController@showindex')->name('project_typeView');

Route::get('admin/project_type/create', 'Project_typeController@create')->name('project_typeCreate');

Route::post('admin/project_type/store', 'Project_typeController@store')->name('project_typeStore');

Route::get('admin/project_type/{id}/view', 'Project_typeController@show')->name('project_typeViewbyid');

Route::get('admin/project_type/edit/{id}', 'Project_typeController@edit')->name('project_typeEdit');

Route::post('admin/project_type//update/{id}', 'Project_typeController@update')->name('project_typeUpdate');

Route::get('admin/project_type/destroy/{id}','Project_typeController@destroy')->name('project_typeDestroy');


// Banner  backend route

Route::get('admin/banner/show', 'BannersController@showindex')->name('bannerView');

Route::get('admin/banner/create', 'BannersController@create')->name('bannerCreate');

Route::post('admin/banner/store', 'BannersController@store')->name('bannerStore');

Route::get('admin/banner/{id}/view', 'BannersController@show')->name('bannerViewbyid');

Route::get('admin/banner/edit/{id}', 'BannersController@edit')->name('bannerEdit');

Route::post('admin/banner/update/{id}', 'BannersController@update')->name('bannerUpdate');

Route::get('admin/banner/destroy/{id}','BannersController@destroy')->name('bannerDestroy');


// landing page SEO  backend route

Route::get('admin/landingpageseo/show', 'LandingpageseoController@showindex')->name('landingpageseoView');

Route::get('admin/landingpageseo/create', 'LandingpageseoController@create')->name('landingpageseoCreate');

Route::post('admin/landingpageseo/store', 'LandingpageseoController@store')->name('landingpageseoStore');

Route::get('admin/landingpageseo/{id}/view', 'LandingpageseoController@show')->name('landingpageseoViewbyid');

Route::get('admin/landingpageseo/edit/{id}', 'LandingpageseoController@edit')->name('landingpageseoEdit');

Route::post('admin/landingpageseo/update/{id}', 'LandingpageseoController@update')->name('landingpageseoUpdate');

Route::get('admin/landingpageseo/destroy/{id}','LandingpageseoController@destroy')->name('landingpageseoDestroy');



// General Setting

Route::get('admin/generalsetting/show', 'GeneralSettingController@index')->name('landingpageseoView');

Route::get('admin/generalsetting/create', 'GeneralSettingController@create')->name('landingpageseoCreate');

Route::post('admin/generalsetting/store', 'GeneralSettingController@store')->name('landingpageseoStore');

Route::get('admin/generalsetting/edit/', 'GeneralSettingController@edit')->name('landingpageseoEdit');

Route::post('admin/generalsetting/update/{id}', 'GeneralSettingController@update')->name('landingpageseoUpdate');

Route::get('admin/generalsetting/destroy/{id}','GeneralSettingController@destroy')->name('landingpageseoDestroy');


// General Setting

Route::get('admin/user/edit/{id}', 'UsersController@edit')->name('usersEdit');

Route::post('admin/user/update/{id}', 'UsersController@update')->name('Userupdate');

Route::get('user_email',  function(){
    return view('email.user_email2');
} );





//  Leads
Route::get('admin/leads/show', 'LeadController@index')->name('lead-index');



// MAPS
Route::get('/maps', 'FronthomeController@maps')->name('maps');
Route::get('/maps2', 'FronthomeController@maps2')->name('maps2');
Route::get('/admin/properties/locations', 'PropertyLocationController@index')->name('property-location');
Route::get('/admin/properties/location/make/{id}', 'PropertyLocationController@make')->name('property-location-make');
Route::POST('/admin/properties/location/update-create', 'PropertyLocationController@update_create')->name('property-location-update-create');
Route::get('/admin/properties/location/delete/{id}', 'PropertyLocationController@delete')->name('property-location-delete');

Route::get('/{lang}/luxury-projects/map', 'FronthomeController@luxury_projects_map')->name('luxury_projects_map');
Route::get('/{lang}/ready-projects/map', 'FronthomeController@ready_projects_map')->name('ready_projects_map');
Route::get('/{lang}/offplan-projects/map', 'FronthomeController@offplan_projects_map')->name('offplan_projects_map');

Route::get('/admin/projects/locations-mgt', 'ProjectLocationController@index')->name('project-location');
Route::get('/admin/projects/location/make/{id}', 'ProjectLocationController@make')->name('project-location-make');
Route::POST('/admin/projects/location/update-create', 'ProjectLocationController@update_create')->name('project-location-update-create');
Route::get('/admin/projects/location/delete/{id}', 'ProjectLocationController@delete')->name('project-location-delete');





// Route::get('/maps', 'FronthomeController@maps')->name('maps');


