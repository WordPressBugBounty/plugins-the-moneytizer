
<div class="container" id="el-intro-0">
  <script>
    var nonceSettings = {
      "update_language" : "<?php echo wp_create_nonce("update_language"); ?>",
      "check_ads_txt" : "<?php echo wp_create_nonce("check_ads_txt"); ?>",
      "update_profile" : "<?php echo wp_create_nonce("update_profile"); ?>",
      "apply_conf" : "<?php echo wp_create_nonce("apply_conf"); ?>",
      "update_data_auto" : "<?php echo wp_create_nonce("update_data_auto"); ?>",
      "do_reactivate_tag" : "<?php echo wp_create_nonce("do_reactivate_tag"); ?>",
      "get_ads_txt" : "<?php echo wp_create_nonce("get_ads_txt"); ?>",
      "do_reset_plugin" : "<?php echo wp_create_nonce("do_reset_plugin"); ?>",
      "get_bill_details" : "<?php echo wp_create_nonce("get_bill_details"); ?>",
      "update_bank_data" : "<?php echo wp_create_nonce("update_bank_data"); ?>",
      "put_format_on_pending" : "<?php echo wp_create_nonce("put_format_on_pending"); ?>",
      "do_generate_tag" : "<?php echo wp_create_nonce("do_generate_tag"); ?>",
      "ads_txt_env_notifier" : "<?php echo wp_create_nonce("ads_txt_env_notifier"); ?>",
      "auto_ads_txt" : "<?php echo wp_create_nonce("auto_ads_txt"); ?>",
      "auto_cmp" : "<?php echo wp_create_nonce("auto_cmp"); ?>",
      "get_cmp" : "<?php echo wp_create_nonce("get_cmp"); ?>",
      "check_cmp" : "<?php echo wp_create_nonce("check_cmp"); ?>",
      "update_data_lazy" : "<?php echo wp_create_nonce("update_data_lazy"); ?>",
      "load_statistics" : "<?php echo wp_create_nonce("load_statistics"); ?>"
    }
  </script>
  <!-- Screeb tag -->
  <script type="text/javascript">
    (function (s,c,r,ee,b) {
      s['ScreebObject']=r;s[r]=s[r]||function(){(s[r].q=s[r].q||[]).push(arguments)};
      b=c.createElement('script');b.type='text/javascript';
      b.id=r;b.src=ee;b.async=1;c.getElementsByTagName("head")[0].appendChild(b);
    }(window,document,'$screeb','https://t.screeb.app/tag.js'));
    
    $screeb('init', '9493ca40-deb7-4a26-9912-4e5ed40e43bf', {
    identity: {
      id: <?php echo absint(get_option('themoneytizer_user_id')); ?>,
      // Set visitor properties
      properties: {}
    }
  });
  <?php _e("TRANSLATION_HOME_SCREEB_SCRIPT",'themoneytizer');?>
  </script>
  <!-- End of Screeb tag -->
  <div id="intro-informations" data-step></div>
  <div class="row" style="margin-top:40px;margin-bottom:40px;">
    <div class="col-6">
      <h4 style="color: #db0436; font-size: 2rem; margin-bottom: 20px;"><?php _e('Bienvenue sur votre MoneyBox','themoneytizer');?></h4>
      <p style="font-size: 1.1rem; color: #333; margin-bottom: 15px;"><?php _e("Gérer vos formats publicitaires, vos informations...",'themoneytizer');?></p>
      <p class="mid-size">
        <?php _e('Url de votre site: ','themoneytizer'); ?>
        <a class="themoneytizer_link" href="<?php echo esc_url(get_option('themoneytizer_site_url')); ?>" target="_blank"/>
          <?php echo esc_html(get_option('themoneytizer_site_url')); ?>
        </a>
        <br/>
        <?php _e('Version CMP','themoneytizer'); ?>: 
        <?php if(get_option('themoneytizer_site_cmp')==-1){
          _e('sans','themoneytizer');
        } else {
          echo esc_html(get_option('themoneytizer_site_cmp'));
        }?>
        <br/>
        <?php _e('Version ads.txt','themoneytizer'); ?>: 
        <?php if(get_option('themoneytizer_site_ads_txt')==-1){
          _e('sans','themoneytizer');
        } else {
          echo esc_html(get_option('themoneytizer_site_ads_txt'));
        }?>
        <br/>
        <?php _e('TRANSLATION_HOME_PLUGIN_VERSION','themoneytizer'); ?>: 
        <?php echo THEMONEYTIZER_PLUGIN_VERSION ?>
        <br/>
        <div style="margin-top: 20px;">
          <?php include('inc/inc_language_list.php'); ?>
        </div>
      </p>
      <?php $remote_update = (array)json_decode(get_option('themoneytizer_site_remote'));
        if(count($remote_update)>0){ ?>
          <button type="button" class="btn btn-primary themoneytizer_badge themoneytizer_pulse themoneytizer_helper" data-bs-toggle="modal" data-bs-target="#applyConf">
              <?php _e('Changements en attente ', 'themoneytizer'); ?> <span style="color: #db0436; background: #fff!important" class="badge bg-secondary"><?php echo absint(count($remote_update)); ?></span>
          </button>
          <div class="modal fade" id="applyConf" tabindex="-1" aria-labelledby="#applyConfLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyConfLabel"><?php _e('Mise à jour paramètres','themoneytizer');?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p class="themoneytizer_card">
                    <?php _e("TRANSLATION_HOME_APPLYREMOTE_TITLE",'themoneytizer');?>
                    <br/>- <?php _e("Modification de configuration CMP", 'themoneytizer'); ?>
                    <br/>- <?php _e("Modification de configuration Ads.txt", 'themoneytizer'); ?>
                    <br/>- <?php _e("Modification de configuration lazy loading", 'themoneytizer'); ?>
                  </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Annuler','themoneytizer');?></button>
                    <button type="button" onClick="applyConf()" class="themoneytizer_button"><?php _e('Appliquer','themoneytizer');?></button>
                </div>
                </div>
            </div>
          </div>

        <?php } ?>
    </div>
    <div class="col-6" style="text-align:right; display: flex; align-items: center; justify-content: flex-end; flex-direction: column;">
      <div style="width:60%; margin-bottom: 20px;">
        <img style="width: 100%; max-width: 300px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));" src="https://www.themoneytizer.com/global/img/logomoneytizer.png" alt="themoneytizer_logo"/>
      </div>
      <div style="width: 100%; text-align: center;">
        <?php include('tab_menu_notifications.php'); ?>
      </div>
    </div>
  </div>
  <?php if(get_option('themoneytizer_site_ads_txt')<1&&get_option('themoneytizer_site_ads_txt')!=-1){ ?>
    <div class="themoneytizer_card">
    <i class="option_required bi bi-exclamation-triangle"></i>&nbsp;&nbsp;
        <?php _e('TRANSLATION_HOME_ADSTXT_REQUIRED', 'themoneytizer') ?>
        <?php _e('TRANSLATION_HOME_ADSTXT_REQUIRED_GOTO', 'themoneytizer') ?>
        &nbsp;<span onclick="jumpToAdsTxt()" class="themoneytizer_link">
          <?php _e('TRANSLATION_HOME_ADSTXT_REQUIRED_GOTO_LABEL', 'themoneytizer') ?>
        </span><?php _e('TRANSLATION_HOME_ADSTXT_REQUIRED_GOTO_2', 'themoneytizer') ?>
    </div>
  <?php } ?>    
  <div class="row" style="margin-top:40px;margin-bottom:80px;">
    <div class="col-12">
      <?php
      include('tab_menu_chart.php');
      if(get_option('themoneytizer_site_ads_txt')>0||get_option('themoneytizer_site_ads_txt')==-1){
        include('tab_menu_tags.php');
        echo '<script>window.pluginHiddenTags = false;</script>';
      } else {
        echo '<script>window.pluginHiddenTags = true;</script>';
      }
      include('tab_menu_profil.php');
      include('tab_menu_bill.php');
      include('tab_menu_faq.php');
      include('tab_menu_sponsorship.php');
      include('tab_menu_settings.php');
      ?>
    </div>
  </div>
</div>
<?php include('inc/inc_notify_toasts.php'); ?>