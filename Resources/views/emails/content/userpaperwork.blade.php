<table width="528" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
<tbody>
    <tr>
        <td mc:edit="title1" class="main-header"
                style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
            <multiline>
                Se ha creado un Trámite
            </multiline>
        </td>
    </tr>
    <tr><td height="20"></td></tr>
    
    <tr>
        <td mc:edit="subtitle1" class="main-subheader"
                style="color: #a4a4a4; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
            <multiline>

            
            <div style="margin-bottom: 5px">
                <span style="color: #484848;">Identificador(ID)</span>      
                {{$userpaperwork->id}}       
            </div>
            <div style="margin-bottom: 5px">
                <span style="color: #484848;">Nombres</span>      
                {{$userpaperwork->user->present()->fullname}}      
            </div>
            <div style="margin-bottom: 5px">
                <span style="color: #484848;">Email</span>      
                {{$userpaperwork->user->email}}      
            </div>

            <div style="margin-bottom: 5px">
                <span style="color: #484848;">{{trans('ipaperwork::paperworks.singular')}}</span>      
                {{$userpaperwork->paperwork->title}}     
            </div>

            <div style="margin-bottom: 5px">
                <span style="color: #484848;">{{trans('ipaperwork::companies.singular')}}</span>      
                {{$userpaperwork->company->title}}     
            </div>

            <div style="margin-bottom: 5px">
                <span style="color: #484848;">{{trans('ipaperwork::userpaperworks.form.comment')}}</span>      
                {{$userpaperwork->comment}}     
            </div>

            <div style="margin-bottom: 5px"><span
                style="color: #484848;">Status</span>
                {!! $userpaperwork->present()->status !!}
            </div>

            
        </tr>

</tbody>
</table>