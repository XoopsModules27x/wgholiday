<style>
    .wgholiday-index-panel {
        margin-bottom: 30px;
    }

    .wgholiday-index-h {
        border-top: 1px solid #0a53be;
        border-bottom: 1px solid #0a53be;
        margin-bottom: 10px;
    }

    .wgholiday-index-row::after {
        content: "";
        display: block;
        width: 96%;
        margin-left: 1%;
        margin-bottom: 10px;
        border-bottom: 1px dotted #999;
    }
    .wgholiday-index-bottons {
        text-align: right;
        margin-top: 10px;
    }
</style>

<{include file='db:wgholiday_header.tpl' }>

<{if $eventsCount|default:0 > 0}>
    <{foreach item=event from=$events_list}>
        <div class="wgholiday-index-panel">
            <div class="row wgholiday-index-h">
                <div class="col-xs-12 col-md-6">
                    <h3>(<{$event.id|default:false}>) <{$event.name|default:false}></h3>
                </div>
                <div class="col-xs-12 col-md-6 wgholiday-index-bottons">
                    <{if $perm_edit|default:false}>
                        <a class='btn btn-primary' href="admin/event.php?op=edit&amp;id=<{$event.id|default:false}>&amp;start=<{$start|default:0}>&amp;limit=<{$limit|default:0}>" title="<{$smarty.const._EDIT}>"><i class='fa fa-edit'></i></a>
                    <{/if}>
                </div>
            </div>
            <{if $use_header|default:false}>
                <div class="row wgholiday-index-row">
                    <div class="col-xs-12 col-md-4">
                        <h4><{$smarty.const._MD_WGHOLIDAY_EVENT_HEADER}></h4>
                        <p class="small"><{$event.header_display_text|default:false}></p>
                    </div>
                    <div class="col-xs-12 col-md-8"><{$event.header_short|default:false}></div>
                </div>
            <{/if}>
            <div class="row wgholiday-index-row">
                <div class="col-xs-12 col-md-4"><h4><{$smarty.const._MD_WGHOLIDAY_EVENT_BODY}></h4></div>
                <div class="col-xs-12 col-md-8"><{$event.body_short|default:false}></div>
            </div>
            <{if $event.image|default:false}>
            <div class="row wgholiday-index-row">
                <div class="col-xs-12 col-md-4">
                    <h4><{$smarty.const._MD_WGHOLIDAY_EVENT_IMAGE}></h4>
                    <p class="small"><{$event.image_display_text|default:false}></p>
                    <p class="small"><{$smarty.const._MD_WGHOLIDAY_EVENT_IMAGEPOS}>: <{$event.image_pos_text|default:false}></p>
                </div>
                <div class="col-xs-12 col-md-8">
                    <img src="<{$wgholiday_upload_url|default:false}>/images/<{$event.image|default:false}>"
                         title="<{$smarty.const._MD_WGHOLIDAY_EVENT_IMAGE_FOR}> <{$event.name|default:false}>"
                         alt="<{$smarty.const._MD_WGHOLIDAY_EVENT_IMAGE_FOR}> <{$event.name|default:false}>" style="max-width:100px" >
                </div>
            </div>
            <{/if}>
            <{if $use_footer|default:false}>
                <div class="row wgholiday-index-row">
                    <div class="col-xs-12 col-md-4">
                        <h4><{$smarty.const._MD_WGHOLIDAY_EVENT_FOOTER}></h4>
                        <p class="small"><{$event.footer_display_text|default:false}></p>
                    </div>
                    <div class="col-xs-12 col-md-8"><{$event.footer_short|default:false}></div>
                </div>
            <{/if}>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <h4><{$smarty.const._MD_WGHOLIDAY_EVENT_STATUS}></h4>
                </div>
                <div class="col-xs-12 col-md-8">
                    <{if $type_onoff_date|default:0}>
                        <{$smarty.const._MD_WGHOLIDAY_EVENT_DATE_SHOWFROM}>: <{$event.date_showfrom_text|default:false}>&nbsp;&nbsp;
                        <{$smarty.const._MD_WGHOLIDAY_EVENT_DATE_SHOWTO}>: <{$event.date_showto_text|default:false}>&nbsp;&nbsp;
                        <img src="<{$wgholiday_icons_url|default:false}>/32/<{$event.date_fromto_img|default:false}>" alt="<{$event.date_fromto_status|default:false}>" title="<{$event.date_fromto_status|default:false}>">
                    <{else}>
                        <{if $perm_edit|default:false}>
                            <form action='event.php' method='post' style='display:inline;'>
                                <{$token_wgholiday}>
                                <input type='hidden' name='op' value='change_status'>
                                <input type='hidden' name='id' value='<{$event.id}>'>
                                <input type='hidden' name='start' value='<{$start}>'>
                                <input type='hidden' name='limit' value='<{$limit}>'>
                                <label><{$event.status_text|default:false}></label>&nbsp;
                                <input type='image'  src='<{$wgholiday_icons_url|default:false}>/32/<{$event.status|default:false}>.png' style='border:0;'>
                            </form>
                        <{else}>
                            <img src="<{$wgholiday_icons_url|default:false}>/32/<{$event.status|default:false}>.png" alt="<{$event.status_text|default:false}>" title="<{$event.status_text|default:false}>">
                        <{/if}>

                    <{/if}>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    <{/foreach}>

    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>

<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<{include file='db:wgholiday_footer.tpl' }>
