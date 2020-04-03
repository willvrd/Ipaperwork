<table width="528" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
<tbody>
    <tr>
        <td mc:edit="title1" class="main-header"
                style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
            <multiline>
                Se ha Actualizado un Trámite
            </multiline>
        </td>
    </tr>
    <tr><td height="20"></td></tr>
    
    <tr>
        <td mc:edit="subtitle1" class="main-subheader"
                style="color: #a4a4a4; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
            <multiline>

            
            <div style="margin-bottom: 5px">
                <span style="color: #484848;">Trámite(ID)</span>      
                {{$uphistory->userPaperwork->id}}      
            </div>

            <div style="margin-bottom: 5px">
                <span style="color: #484848;">{{trans('ipaperwork::paperworks.singular')}}</span>      
                {{$uphistory->userPaperwork->paperwork->title}}     
            </div>

            <br><br>

            <div style="margin-bottom: 5px"><span
                style="color: #484848;">Status</span>
                {!! $uphistory->present()->status !!}
            </div>
            
            @if(!empty($uphistory->comment))
            <div style="margin-bottom: 5px">
                <span style="color: #484848;">{{trans('ipaperwork::userpaperworks.form.comment')}}</span>      
                {{$uphistory->comment}}     
            </div>
            @endif

            

            
        </tr>

</tbody>
</table>