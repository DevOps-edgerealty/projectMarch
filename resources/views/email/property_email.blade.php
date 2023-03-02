<h2>Property Enquiry</h2><br>

<h3>Property Name : {{ $property_name }}</h3>


<h3>Here are the details:</h3>


<table class="table table-striped" style="font-size: 16px; padding: 10px;">

    <tbody>

        <tr>

            <td style="padding-left: 20px"><b>Property Name :</b> </td>
            <td>{{ $property_name }}</td>

        </tr>

        <tr>

            <td style="padding-left: 20px"><b>Name :</b> </td>
            <td>{{$name}}</td>

        </tr>
        <tr>

            <td style="padding-left: 20px"><b>Phone Number :</b> </td>
            <td>{{ $phone_number }}</td>

        </tr>
        <tr>

            <td style="padding-left: 20px"><b>Email :</b> </td>
            <td>{{ $email }}</td>

        </tr>

        <tr>

            <td style="padding-left: 20px"><b>IP Address :</b> </td>
            <td>{{ $field_ip }}</td>

        </tr>

        <tr>

            <td style="padding-left: 20px"><b>Lead Source :</b> </td>
            <td>{{ $currentURL }}</td>

        </tr>



        <tr>

            <td style="padding-left: 20px"><b>Agent Name :</b> </td>
            <td>{{ $agent_name }}</td>

        </tr>



    </tbody>
</table>
<br>

<h2>Thank You</h2>
