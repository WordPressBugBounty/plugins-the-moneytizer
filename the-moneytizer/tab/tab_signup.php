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
<div class="row" style="margin-top:40px;margin-bottom:40px;">
    <div class="col-6" >
      <h4 style="color: #db0436; font-size: 2rem; margin-bottom: 20px;"><?php _e('Bienvenue sur votre MoneyBox','themoneytizer');?></h4>
      <p style="font-size: 1.1rem; color: #333; margin-bottom: 15px;"><?php _e("Gérer vos formats publicitaires, vos informations...",'themoneytizer');?></p>
      <p class="mid-size" style="line-height: 1.6; color: #555;">
        <?php _e('Pour commencer à utiliser le plugin wordpress The Moneytizer, commencez par vous authentifier ou vous créer un compte en utilisant une des méthodes ci-dessous.', 'themoneytizer'); ?>
      </p>
    </div>
    <div class="col-6" style="text-align:right; display: flex; align-items: center; justify-content: flex-end; flex-direction: column;">
        <div style="width:60%; margin-bottom: 15px;">
            <img style="width: 100%; max-width: 300px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));" src="https://www.themoneytizer.com/global/img/logomoneytizer.png" alt="themoneytizer_logo"/>
        </div>
        <div style="text-align: center;">
            <?php include('inc/inc_language_list.php'); ?>
        </div>
    </div>
</div>   
<div class="themoneytizer_card mid-size">
    <h5><?php _e('Votre site est déjà inscrit sur notre plateforme ?','themoneytizer');?></h5>
    <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
        <div style="width:100%;">

            <form id="token_form" method="post" action="options-general.php?page=themoneytizer">
                <input type="hidden" name="themoneytizer_is_registered"  value="4">
                <input type="hidden" name="wplang" id="wplang" value="<?php echo esc_attr( get_option( 'WPLANG' ) ); ?>">
                <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                    <label for="themoneytizer_setting_token" style="margin-right: 10px;"><?php _e('Moneytizer ID*:','themoneytizer');?></label>
                    <input type="text" class="width_money" name="themoneytizer_setting_token" id="themoneytizer_setting_token"  value="<?php echo esc_attr( get_option( 'themoneytizer_setting_token' ) ); ?>" style="width: 350px; max-width: 350px;">
                    <input type="submit"  id="submit" name="submit" class="themoneytizer_button" value="Log In" style="margin-left: 0;">
                </div>
            </form>
            <div>
                <h6 style="margin-top: 15px"><?php _e('Où trouver mon identifiant ?','themoneytizer');?></h6>
                <p class="mid-size"><?php _e('Votre identifiant est affiché sur la page dédiée à votre site de votre espace éditeur personnel. Pour y accéder, rendez-vous sur votre <a class="themoneytizer_link" href="https://www.themoneytizer.com/new_manager/wordpress" target="_blank">Moneybox</a>','themoneytizer');?>.<br/>
                <i class="bi bi-info-circle"></i>&nbsp;<?php _e('Votre identifiant est une suite de lettres et chiffres par exemple.','themoneytizer');?>"<b>3b2b79d0667e6e43ee962fc3ff6349f6</b>"</p>
            </div>
        </div>
    </div>
</div>
<div class="themoneytizer_card mid-size" style="margin-top: 5px">
    <h5><?php _e('Votre site n\'est pas encore inscrit sur notre plateforme ou vous n\'avez pas de compte ?','themoneytizer');?></h5>
    <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
        <div style="width:55%;margin-right:5%;">
            <p class="mid-size">
                <?php _e('Rendez-vous sur la page suivante pour inscrire votre site ou créer un compte, utilisez ensuite votre id wordpress pour vous connecter.','themoneytizer');?>
                <a class="themoneytizer_link" href="https://www.themoneytizer.com/new_manager/main&step=1" target="_blank"><?php _e('Inscrire un site ou créer un compte.', 'themoneytizer'); ?></a>
            </p>
    </div>
</div>