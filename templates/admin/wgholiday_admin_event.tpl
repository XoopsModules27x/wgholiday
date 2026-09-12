
<style>
    .width10 {
        width: 10%;
    }
    .wgholiday-buttons a {
        padding: 6px 6px !important;
    }
    .wgholiday-table .center {
        text-align: center;
    }
</style>

<!-- Header -->
<{include file='db:wgholiday_admin_header.tpl' }>

<{if $events_list|default:''}>
    <table class='outer wgholiday-table'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_ID}></th>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_NAME}></th>
                <{if $use_header|default:false}>
                    <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_HEADER}></th>
                <{/if}>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_BODY}></th>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_IMAGE}></th>
                <{if $use_footer|default:false}>
                    <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_FOOTER}></th>
                <{/if}>
                <{if $type_onoff_date|default:0}>
                    <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_DATE_SHOWFROM}></th>
                    <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_DATE_SHOWTO}></th>
                <{/if}>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_STATUS}></th>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_DATE_CREATED}></th>
                <th class="center"><{$smarty.const._AM_WGHOLIDAY_EVENT_SUBMITTER}></th>
                <th class="center width10"><{$smarty.const._AM_WGHOLIDAY_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $events_count|default:''}>
        <tbody class="wgholiday_events-body">
            <{foreach item=event from=$events_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$event.id|default:false}></td>
                <td class='center'><{$event.name|default:false}></td>
                <{if $use_header|default:false}>
                    <td class=''>
                        <{if $event.header_short|default:false}>
                            <div><{$event.header_short|default:false}></div>
                            <div>(<{$event.header_display_text|default:false}>)</div>
                        <{/if}>
                    </td>
                <{/if}>
                <td class=''><{$event.body_short|default:false}></td>
                <td class='center'>
                    <div><img src="<{$wgholiday_upload_url|default:false}>/images/<{$event.image|default:false}>"
                              title="<{$smarty.const._AM_WGHOLIDAY_EVENT_IMAGE_FOR}> <{$event.name|default:false}>"
                              alt="<{$smarty.const._AM_WGHOLIDAY_EVENT_IMAGE_FOR}> <{$event.name|default:false}>" style="max-width:100px" ></div>
                    <div>(<{$event.image_display_text|default:false}>)</div>
                    <div>(<{$event.image_pos_text|default:false}>)</div>
                </td>
                <{if $use_footer|default:false}>
                    <td class=''>
                        <{if $event.footer_short|default:false}>
                            <div><{$event.footer_short|default:false}></div>
                            <div>(<{$event.footer_display_text|default:false}>)</div>
                        <{/if}>
                    </td>
                <{/if}>
                <{if $event.date_showfrom_text|default:0}>
                    <td class='center'><{$event.date_showfrom_text|default:false}></td>
                    <td class='center'><{$event.date_showto_text|default:false}></td>
                    <td class='center'>
                        <img src="<{$wgholiday_icons_url|default:false}>/32/<{$event.date_fromto_img|default:false}>" alt="<{$event.date_fromto_status|default:false}>" title="<{$event.date_fromto_status|default:false}>">
                    </td>
                <{else}>
                    <td class='center'>
                        <form action='event.php' method='post' style='display:inline;'>
                            <{$token}>
                            <input type='hidden' name='op' value='change_status'>
                            <input type='hidden' name='id' value='<{$event.id}>'>
                            <input type='hidden' name='start' value='<{$start}>'>
                            <input type='hidden' name='limit' value='<{$limit}>'>
                            <input type='image'  src='<{$wgholiday_icons_url|default:false}>/32/<{$event.status|default:false}>.png' style='border:0;'>
                        </form>
                    </td>
                <{/if}>
                <td class='center'><{$event.date_created_text|default:false}></td>
                <td class='center'><{$event.submitter_text|default:false}></td>
                <td class="center width10 xo-buttons wgholiday-buttons">
                    <a href="event.php?op=edit&amp;id=<{$event.id|default:false}>&amp;start=<{$start|default:0}>&amp;limit=<{$limit|default:0}>" title="<{$smarty.const._EDIT}>"><i class='fa fa-edit'></i></a>
                    <a href="event.php?op=clone&amp;id_source=<{$event.id|default:false}>" title="<{$smarty.const._CLONE}>"><i class='fa fa-copy'></i></a>
                    <a href="event.php?op=delete&amp;id=<{$event.id|default:false}>" title="<{$smarty.const._DELETE}>"><i class='fa fa-trash'></i></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgholiday_admin_footer.tpl' }>
