
<h2><a href="@route('/settingspage')">Settings</a> / System Information</h2>

<div class="app-panel uk-width-medium-3-4">

    <h3>PHP</h3>
    
    <table class="uk-table uk-table-striped">
        <tbody>
            <tr>
                <td>Version</td>
                <td>{{ $info['phpversion'] }}</td>
            </tr>
            <tr>
                <td>PHP to Webserver interface</td>
                <td>{{ $info['sapi_name'] }}</td>
            </tr>
            <tr>
                <td>System</td>
                <td>{{ $info['system'] }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Mailer</h3>
    
    @if($info["mailer"])

    <table class="uk-table uk-table-striped">
        <tbody>
            @foreach($info['mailer'] as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ ($key=="password") ? str_pad("", strlen($value), '*') : $value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    
    <div class="uk-alert">
        No mailer settings found.
    </div>

    @endif


    <h3>Directories</h3>
    
    <table class="uk-table uk-table-striped">
        <tbody>
            <tr>
                <th>Path</th>
                <th>Status</th>
            </tr>
        </tbody>
        <tbody>
            @foreach($info['folders'] as $folder=>$permission)
            <tr>
                <td>{{ $app->pathToUrl($folder) }}</td>
                <td><div class="uk-badge uk-badge-{{ $permission ? 'success':'danger' }}">writable</div></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @trigger("cockpit.settings.infopage")

</div>