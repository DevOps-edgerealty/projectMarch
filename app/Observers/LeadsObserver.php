<?php

namespace App\Observers;

use App\Models\Leads;

class LeadsObserver
{
    /**
     * Handle the leads "created" event.
     *
     * @param  \App\Leads  $leads
     * @return void
     */
    public function created(Leads $leads)
    {
        $data = [
            'full_name' => $leads->full_name,
            'phone' => $leads->phone,
            'email' => $leads->email,
            'page_url' =>$leads->page_url,
            'inquiry' => $leads->lead_name,
            'type_id' => $leads->type_id,
            'field_ip' => $leads->ip_address,
            'source' => $leads->source,
            'utm_parameters' => $leads->utm_parameters,
            'paid_campaigns' => $leads->paid_campaigns,
            'agent' => '0',
        ];


        $curl = curl_init();

        $url = 'https://crm.edgerealty.ae/api/lead-save';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6IjFkM2xHVFdOUE9TeGt2ZGdKQUpkb2c9PSIsInZhbHVlIjoiSVpCQkNtZWVEdDQ4dXBTMmFYbkV0V2JCNEJPdWhZeVVhN1FuaTg0RnFnWDVuZFFZRmR5aXFGM1lBWlk0OEptOXFjbUFvc3dwdkN4TXBKZ1V0SEdSd0dXV042aVpBc2Z4UUd2YUNWc2ZrVjFqME9aZWUyckI3ZHQ4SURPc3VjT3ciLCJtYWMiOiJjMGUzYmI0ODYzMTBmYmZmN2MzNDkxMDJmZWQ2ZmUyZTc1YmYwNDJlMzEyN2ZmNWU0ODM2ZGJjYTI1ZTljZWU4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImRacTNQdlNWRHArZDdHc2FVQUNYQWc9PSIsInZhbHVlIjoibFo4L2oyVVdQUGVYYTRSZ2s4RWxUaWQ1ZlJ2SkJWcnhCaktNcUsrYVNIeWpMekhZVDBtWWJDUnlsU1RaMHZGMTlkK1FNSHNhb3EzeWdZbEgrQVVzbHpZOEN0Y0pNbE9pazgvSzl6Y01ycTBPTWNkMnpWZ2Z5aFg2bGtyN0hEN1YiLCJtYWMiOiIyYTQyNDc2NWY5NWJlMjAzY2UzNzY3ZWIyZDNhYTQxYWQ2NmYzZjE0NmY4ZGUwZDI0MzcxOTA0MzI5NDBmYzk4IiwidGFnIjoiIn0%3D'
            ),
        )
        );

    $response = curl_exec($curl);

    curl_close($curl);


    }

    /**
     * Handle the leads "updated" event.
     *
     * @param  \App\Leads  $leads
     * @return void
     */
    public function updated(Leads $leads)
    {
        //
    }

    /**
     * Handle the leads "deleted" event.
     *
     * @param  \App\Leads  $leads
     * @return void
     */
    public function deleted(Leads $leads)
    {
        //
    }

    /**
     * Handle the leads "restored" event.
     *
     * @param  \App\Leads  $leads
     * @return void
     */
    public function restored(Leads $leads)
    {
        //
    }

    /**
     * Handle the leads "force deleted" event.
     *
     * @param  \App\Leads  $leads
     * @return void
     */
    public function forceDeleted(Leads $leads)
    {
        //
    }
}
