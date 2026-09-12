<{if $block.header_block|default:false}>
    <h3 class="wgholiday_block_header"><{$block.header_block|default:false}></h3>
<{/if}>
<div class="wgholiday_block_body">
    <!-- image position top -->
    <{if $image_pos_top == $block.image_pos|default:0}>
        <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_block|default:false}>" alt="<{$block.name|default:false}>" >
        <{$block.body_text|default:false}>
    <{/if}>
    <!-- image position left -->
    <{if $image_pos_left == $block.image_pos|default:0}>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_block|default:false}>" alt="<{$block.name|default:false}>" >
            </div>
            <div class="col-xs-12 col-md-6"><{$block.body_text|default:false}></div>
        </div>
    <{/if}>
    <!-- image position right -->
    <{if $image_pos_right == $block.image_pos|default:0}>
        <div class="row">
            <div class="col-xs-12 col-md-6"><{$block.body_text|default:false}></div>
            <div class="col-xs-12 col-md-6">
                <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_block|default:false}>" alt="<{$block.name|default:false}>" >
            </div>
        </div>
    <{/if}>
    <!-- image position bottom -->
    <{if $image_pos_bottom == $block.image_pos|default:0}>
        <{$block.body_text|default:false}>
        <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_block|default:false}>" alt="<{$block.name|default:false}>" >
    <{/if}>
</div>

<{if $block.footer_block|default:false}>
    <p class="wgholiday_block_footer"><{$block.footer_block|default:false}></p>
<{/if}>


<div id="wgholiday-modal-<{$block.id|default:0}>" class="wgholiday-modal" aria-hidden="true">
    <div class="wgholiday-modal-overlay"></div>

    <div class="wgholiday-modal-dialog" role="dialog" aria-modal="true">
        <button type="button" class="wgholiday-modal-close" aria-label="<{$smarty.const._MB_WGHOLIDAY_EVENT_CLOSE}>">
            &times;
        </button>

        <div class="wgholiday-modal-content">
            <{if $block.header_modal|default:false}>
                <h2 class="wgholiday_block_header"><{$block.header_modal|default:false}></h2>
            <{/if}>
            <div class="wgholiday_block_body">
                <!-- image position top -->
                <{if $image_pos_top == $block.image_pos|default:0}>
                    <{if $block.image_modal|default:false}>
                        <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_modal|default:false}>" alt="<{$block.name|default:false}>" >
                    <{/if}>
                    <{$block.body_text|default:false}>
                <{/if}>
                <!-- image position left -->
                <{if $image_pos_left == $block.image_pos|default:0}>
                    <div class="row">
                        <{if $block.image_modal|default:false}>
                            <div class="col-xs-12 col-md-6">
                                <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_modal|default:false}>" alt="<{$block.name|default:false}>" >
                            </div>
                            <div class="col-xs-12 col-md-6">
                        <{else}>
                            <div class="col-xs-12 col-md-12">
                        <{/if}>
                        <{$block.body_text|default:false}></div>
                    </div>
                <{/if}>
                <!-- image position right -->
                <{if $image_pos_right == $block.image_pos|default:0}>
                    <div class="row">
                        <{if $block.image_modal|default:false}>
                            <div class="col-xs-12 col-md-6">
                        <{else}>
                            <div class="col-xs-12 col-md-12">
                        <{/if}>
                        <{$block.body_text|default:false}></div>
                        <{if $block.image_modal|default:false}>
                            <div class="col-xs-12 col-md-6">
                                <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_modal|default:false}>" alt="<{$block.name|default:false}>" >
                            </div>
                        <{/if}>
                    </div>
                <{/if}>
                <!-- image position bottom -->
                <{if $image_pos_bottom == $block.image_pos|default:0}>
                    <{$block.body_text|default:false}>
                    <{if $block.image_modal|default:false}>
                        <img class="img-fluid img-responsive" src="<{$wgholiday_upload_image_url|default:false}>/<{$block.image_modal|default:false}>" alt="<{$block.name|default:false}>" >
                    <{/if}>
                <{/if}>
            </div>
            <{if $block.footer_modal|default:false}>
            <p class="wgholiday_block_footer"><{$block.footer_modal|default:false}></p>
            <{/if}>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('wgholiday-modal-<{$block.id|default:0}>');

        if (!modal) {
            return;
        }

        const closeButton = modal.querySelector('.wgholiday-modal-close');
        const overlay = modal.querySelector('.wgholiday-modal-overlay');

        function openModal() {
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('wgholiday-modal-open');
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('wgholiday-modal-open');
        }

        closeButton.addEventListener('click', closeModal);
        overlay.addEventListener('click', closeModal);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                closeModal();
            }
        });

        // open modal automatically when site is loaded
        openModal();
    });
</script>