<?php
  $themoneytizer_wp_lang = get_option('themoneytizer_user_language');
  // array of language and sub-domain available for The Moneytizer website --> 'en' doesn't exist
  $themoney_sub_domain = array('fr' => 'www', 'en' => 'us', 'us' => 'us', 'es' => 'es', 'pt' => 'pt', 'de' => 'de', 'it' => 'it', 'pl' => 'pl', 'ru' => 'ru');
?>
<div class="accordion" id="accordion_menu_settings">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_settings">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_settings" aria-expanded="true" aria-controls="collapse_menu_settings">
            <i class="bi bi-tools"></i>&nbsp;<?php _e('Paramètres du plugin','themoneytizer');?>
        </button>
        </h2>
        <div id="collapse_menu_settings" class="accordion-collapse collapse" aria-labelledby="menu_settings" data-bs-parent="#accordion_menu_settings">
            <div class="accordion-body" style="padding: 2rem;">
                <!-- Section Ads.txt -->
                <div class="settings-section" style="margin-bottom: 2.5rem;">
                    <div class="settings-section-header" style="display: flex; align-items: center; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid #e9ecef;">
                        <i class="bi bi-file-text" style="font-size: 1.5rem; color: #db0436; margin-right: 0.75rem;"></i>
                        <h5 style="margin: 0; color: #333; font-weight: 600; font-size: 1.25rem;"><?php _e('Ads.txt', 'themoneytizer');?></h5>
                    </div>
                    <div id="adstxt_panel" class="themoneytizer_card" style="margin-bottom: 1.5rem; padding: 1.5rem;">
                        <div class="ads_txt_env_notifier themoneytizer_card" style="margin-bottom: 1.5rem; display: none; background-color: #fff3cd; border-color: #ffc107;">
                            <i class="option_required bi bi-exclamation-triangle" style="font-size: 1.25rem;"></i>
                            &nbsp;&nbsp;
                            <span class="message-content" style="font-weight: 500;"></span>
                        </div>
                        <div class="settings-info-box" style="background-color: #f8f9fa; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border-left: 4px solid #db0436;">
                            <p class="mid-size" style="margin: 0; line-height: 1.6;">
                                <i class="bi bi-info-circle" style="color: #db0436; margin-right: 0.5rem;"></i>
                                <?php _e('Intégrez le fichier ADS.TXT au plus vite sur votre site sous peine de ne plus être monétisé.','themoneytizer') ?>
                                <br>
                                <?php _e('Toutes les informations concernant cette norme','themoneytizer') ?>
                                <?php if (array_key_exists($themoneytizer_wp_lang, $themoney_sub_domain)) { ?>
                                <a class="themoneytizer_link" href="<?php echo esc_url( 'https://' . ( array_key_exists( $themoneytizer_wp_lang, $themoney_sub_domain ) ? $themoney_sub_domain[ $themoneytizer_wp_lang ] : 'www' ) . '.themoneytizer.com/blog/fichier-ads-txt-the-moneytizer/' ); ?>" target="_blank">
                                    <?php _e('ici','themoneytizer') ?>
                                </a>
                                <?php } else { ?>
                                <a class="themoneytizer_link" href="https://www.themoneytizer.com/blog/fichier-ads-txt-the-moneytizer/" target="_blank">
                                    <?php _e('ici','themoneytizer') ?>
                                </a>
                                <?php } ?>
                            </p>
                        </div>

                        <div class="settings-option-toggle" style="margin-bottom: 1.5rem; padding: 1.25rem; background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); border-radius: 0.75rem; border: 1px solid #e9ecef; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                            <label for="auto_option_ads_txt" class="toggle-switch-label" style="display: flex; align-items: center; justify-content: space-between; cursor: pointer; margin: 0;">
                                <div style="display: flex; align-items: center; flex: 1;">
                                    <i class="bi bi-gear-fill" style="color: #db0436; margin-right: 0.75rem; font-size: 1.1rem;"></i>
                                    <div>
                                        <span style="font-weight: 600; color: #333; font-size: 1rem; display: block;"><?php _e('Placement automatique de l\'ads.txt', 'themoneytizer') ?></span>
                                        <span style="font-size: 0.875rem; color: #6c757d; display: block; margin-top: 0.25rem;"><?php _e('Génération et mise à jour automatiques', 'themoneytizer') ?></span>
                                    </div>
                                </div>
                                <div class="toggle-switch-container" style="margin-left: 1.5rem;">
                                    <input onClick="ads_txt_setting()" name="auto-ads-txt-checkbox" type="checkbox" id="auto_option_ads_txt" class="modern-toggle-switch"
                                        <?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'checked' : '') ?>
                                    />
                                    <label for="auto_option_ads_txt" class="toggle-switch-slider"></label>
                                </div>
                            </label>
                        </div>

                        <div class="settings-actions" style="display: <?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'none' : 'flex') ?>; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
                            <div style="display:<?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'none' : 'block') ?>">
                                <button onClick="ads_txt_download()" class="themoneytizer_button" id="themoney-download-ads-txt" style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="bi bi-download"></i>
                                    <?php _e('Télécharger le fichier','themoneytizer') ?>
                                </button>
                            </div>
                            <button class="themoneytizer_button" id="themoney-check-ads-txt" onclick="checkAdsTxt(<?php echo absint( $themoney_website->site_id ); ?>)" style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="bi bi-check-circle"></i>
                                <?php _e('Vérifier votre fichier ads.txt','themoneytizer') ?>
                            </button>
                        </div>

                        <div class="settings-warning" style="display:<?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'none' : 'block') ?>; background-color: #fff3cd; padding: 1rem; border-radius: 0.5rem; border-left: 4px solid #ffc107;">
                            <p class="mid-size" style="margin: 0; display: flex; align-items: start;">
                                <i class="bi bi-exclamation-triangle-fill" style="color: #856404; margin-right: 0.75rem; margin-top: 0.2rem;"></i>
                                <span>
                                    <strong><?php _e('ATTENTION :','themoneytizer') ?></strong>
                                    <?php _e('Si vous avez déjà des publicités Adsense vous aurez besoin d\'ajouter votre ligne Adsense au fichier avant de le mettre en ligne','themoneytizer') ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Section CMP -->
                <div class="settings-section" style="margin-bottom: 2.5rem;">
                    <div class="settings-section-header" style="display: flex; align-items: center; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid #e9ecef;">
                        <i class="bi bi-shield-check" style="font-size: 1.5rem; color: #db0436; margin-right: 0.75rem;"></i>
                        <h5 style="margin: 0; color: #333; font-weight: 600; font-size: 1.25rem;"><?php _e('CMP', 'themoneytizer');?></h5>
                    </div>
                    <div id="el-intro-8" class="themoneytizer_card" style="padding: 1.5rem;">
                        <div class="settings-info-box" style="background-color: #f8f9fa; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border-left: 4px solid #0d6efd;">
                            <p class="mid-size" style="margin: 0 0 1rem 0; line-height: 1.6;">
                                <i class="bi bi-info-circle" style="color: #0d6efd; margin-right: 0.5rem;"></i>
                                <?php _e('Afin de mettre en conformité votre site avec le nouveau Règlement Général sur la Protection des Données, il est impératif de diffuser un bandeau de consentement compatible avec cette nouvelle loi.','themoneytizer') ?>
                            </p>
                            <p style="margin: 0; line-height: 1.6;">
                                <?php _e('Copiez le code ci-dessous et mettez le dans le "head" de votre site ou activer le placement automatique de la CMP','themoneytizer') ?>
                            </p>
                        </div>
                        <div class="settings-option-toggle" style="margin-bottom: 1.5rem; padding: 1.25rem; background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); border-radius: 0.75rem; border: 1px solid #e9ecef; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                            <label for="option_auto_cmp" class="toggle-switch-label" style="display: flex; align-items: center; justify-content: space-between; cursor: pointer; margin: 0;">
                                <div style="display: flex; align-items: center; flex: 1;">
                                    <i class="bi bi-shield-check" style="color: #0d6efd; margin-right: 0.75rem; font-size: 1.1rem;"></i>
                                    <div>
                                        <span style="font-weight: 600; color: #333; font-size: 1rem; display: block;"><?php _e('Placement automatique de la CMP sur votre site', 'themoneytizer') ?></span>
                                        <span style="font-size: 0.875rem; color: #6c757d; display: block; margin-top: 0.25rem;"><?php _e('Intégration automatique dans le head de votre site', 'themoneytizer') ?></span>
                                    </div>
                                </div>
                                <div class="toggle-switch-container" style="margin-left: 1.5rem;">
                                    <input onClick="cmp_setting()" name="cmp-auto-checkbox" type="checkbox" id="option_auto_cmp" class="modern-toggle-switch"
                                        <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'checked' : '') ?>
                                    />
                                    <label for="option_auto_cmp" class="toggle-switch-slider"></label>
                                </div>
                            </label>
                        </div>
                        <div id="themoneytizer_tag_cmp" style="display: <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'none' : 'block') ?>; margin-bottom: 1.5rem;"></div>
                        <div class="settings-actions" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <div id="container_themoney_copy_cmp" style="display: <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'none' : 'inline-block') ?>">
                                <button class="themoneytizer_button" id="themoney-copy-cmp" style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="bi bi-clipboard"></i>
                                    <?php _e('Copier dans le presse papier','themoneytizer') ?>
                                </button>
                            </div>
                            <button class="themoneytizer_button" id="themoney-check-cmp" onclick="checkCmp(<?php echo absint( $themoney_website->site_id ); ?>)" style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="bi bi-check-circle"></i>
                                <?php _e('Vérifier votre bandeau de consentement','themoneytizer') ?>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section Paramètres généraux -->
                <div class="settings-section">
                    <div class="settings-section-header" style="display: flex; align-items: center; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid #e9ecef;">
                        <i class="bi bi-gear" style="font-size: 1.5rem; color: #db0436; margin-right: 0.75rem;"></i>
                        <h5 style="margin: 0; color: #333; font-weight: 600; font-size: 1.25rem;"><?php _e('Paramètres','themoneytizer');?></h5>
                    </div>
                    <div class="themoneytizer_card" style="padding: 1.5rem;">
                        <div class="settings-info-box" style="background-color: #f8f9fa; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                            <p class="mid-size" style="margin: 0; line-height: 1.8;">
                                <i class="bi bi-info-circle" style="color: #6c757d; margin-right: 0.5rem;"></i>
                                <strong><?php _e('Version actuelle du plugin','themoneytizer');?>:</strong> 
                                <span style="color: #db0436; font-weight: 600;"><?php echo esc_html( defined( 'THEMONEYTIZER_PLUGIN_VERSION' ) ? THEMONEYTIZER_PLUGIN_VERSION : get_option( 'themoneytizer_plugin_version', '10.0.8' ) ); ?></span>
                            </p>
                        </div>
                        <div style="padding-top: 1rem; border-top: 1px solid #e9ecef;">
                            <p class="mid-size" style="margin-bottom: 1rem; color: #6c757d;">
                                <?php _e('Vous pouvez réinitialiser le plugin si vous le souhaitez en cliquant sur le bouton ci-dessous :','themoneytizer');?>
                            </p>
                            <button type="button" class="themoneytizer_button" data-bs-toggle="modal" data-bs-target="#resetPlugin" style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <?php _e('Réinitialisation du plugin','themoneytizer');?>
                            </button>
                        </div>
                        <div class="modal fade" id="resetPlugin" tabindex="-1" aria-labelledby="#resetPluginLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="resetPluginLabel">
                                            <i class="bi bi-exclamation-triangle" style="color: #db0436; margin-right: 0.5rem;"></i>
                                            <?php _e('Réinitialisation du plugin','themoneytizer');?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php _e('Êtes-vous sûr de vouloir réinitialiser le plugin ?','themoneytizer');?></p>
                                        <p class="text-muted" style="font-size: 0.9rem; margin-top: 0.5rem;">
                                            <?php _e('Cette action supprimera toutes vos configurations et vous devrez vous reconnecter.','themoneytizer');?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Annuler','themoneytizer');?></button>
                                        <button type="button" onClick="resetPlugin()" class="themoneytizer_button"><?php _e('Oui, réinitialiser','themoneytizer');?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
