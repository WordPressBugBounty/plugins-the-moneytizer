
<tr id="el-intro-tag-<?php echo esc_attr( $format->ad_id ); ?>">
    <td class="td_medium table-multi-center">
        <img src="<?php echo esc_url( $format->path_format_img . $format->ad_img ); ?>" alt="<?php echo esc_attr( $format->form_name ); ?>"/> <br>
        <?php echo esc_html(__($format->ad_name,'themoneytizer')); ?>
    </td>
    <?php if($format->ad_id == 20){
    } ?>
    <td id="container_action_<?php echo esc_attr( $format->ad_id ); ?>">
        <?php if(in_array($format->ad_id, [5,16])){
            if($format->form_ad_id == null){
                $format->disabled = 'disabled'; ?>
                <div class="ask themoneytizer_button center button-tag-status" style="background-color: #3498db;" onclick="pendingFormat(<?php echo absint( $format->ad_id ); ?>)">
                    <i class="bi bi-clock ico-tag-status"></i>&nbsp;&nbsp;<span><?php _e('Demander le format','themoneytizer'); ?></span>
                </div>
            <?php } elseif($format->form_state == 1) {
                $format->disabled = 'disabled'; ?>
                <div class="themoneytizer_button center button-tag-status" style="background-color: #d64e07; cursor: default">
                    <i class="bi bi-clock ico-tag-status"></i>&nbsp;&nbsp;<span><?php _e('En attente','themoneytizer'); ?></span>
                </div>
            <?php } elseif ($format->form_state == 0) {
                $format->disabled = 'disabled'; ?>
                <div class="themoneytizer_button center button-tag-status" style="cursor: default">
                    <i class="bi bi-x-circle ico-tag-status"></i>&nbsp;&nbsp;<span><?php _e('Refusé','themoneytizer'); ?></span>
                </div>
            <?php } else {
                if($format->tag_id == null){ ?>
                    <div class="themoneytizer_button center button-tag-status" id="generate-<?php echo absint( $format->ad_id ); ?>-<?php echo absint( $themoney_website->site_id ); ?>" onclick="generateTag(<?php echo absint( $format->ad_id ); ?>,<?php echo absint( get_option( 'themoneytizer_site_id' ) ); ?>)">
                        <i class="bi bi-plus-circle ico-tag-status"></i>&nbsp;&nbsp;<?php _e('Générer le script','themoneytizer'); ?>
                    </div>
                <?php } else { ?>
                    <div class="themoneytizer_button center button-tag-status" style="background-color: #00d084; cursor: default">
                        <i class="bi bi-check-circle ico-tag-status"></i>&nbsp;&nbsp;<span><?php _e('Accepté','themoneytizer'); ?></span>
                    </div>
                <?php }
            }
        } else {
            if ($format->form_state == 0 && $format->form_state != null) {
                $format->disabled = 'disabled'; ?>
                <div class="themoneytizer_button center button-tag-status" style="cursor: default">
                    <i class="bi bi-x-circle ico-tag-status"></i>&nbsp;&nbsp;<span><?php _e('Refusé','themoneytizer'); ?></span>
                </div>
            <?php } else {
                if (($format->tag_id === null && $format->form_state == 2) || $format->form_state == null) {
                    $format->disabled = 'disabled'; ?>
                    <div class="themoneytizer_button center button-tag-status" id="generate-<?php echo absint( $format->ad_id ); ?>-<?php echo absint( $themoney_website->site_id ); ?>" onclick="generateTag(<?php echo absint( $format->ad_id ); ?>,<?php echo absint( get_option( 'themoneytizer_site_id' ) ); ?>)">
                        <i class="bi bi-plus-circle ico-tag-status"></i>&nbsp;&nbsp;<?php _e('Générer le script','themoneytizer'); ?>
                    </div>
                <?php }
            }
        }
        if ($format->tag_actif != '' && $format->tag_actif == 0 && $format->form_state == 2) { ?>
            <div class="themoneytizer_button center button-tag-status" id="btn_reactivate_<?php echo esc_attr( $format->tag_id ); ?>" onclick="reactivateTag(<?php echo absint( $format->tag_id ); ?>, <?php echo absint( $format->ad_id ); ?>)">
                <i class="bi bi-clock-history ico-tag-status"></i>&nbsp;&nbsp;<?php _e('Réactiver le tag','themoneytizer'); ?>
            </div>
        <?php } ?>
    </td>
    <?php if(in_array($format->ad_id, TAG_AUTOPLACE) && $format->form_state != 0){
        if ($format->form_state == 1 || in_array($format->form_state, [0, 1])) {
            $format->disabled = 'disabled';
        } ?>
        <td id="container_auto_<?php echo esc_attr( $format->ad_id ); ?>" style='text-align: center'>
            <label for='<?php echo esc_attr( $format->ad_id ); ?>'><?php _e('Placement automatique', 'themoneytizer'); ?></label>
            <input onChange="saveAutoAd(<?php echo absint( $format->ad_id ); ?>)"
                class='checkbox_format' name='formatauto[]' id='data_auto_<?php echo esc_attr( $format->ad_id ); ?>' value='<?php echo esc_attr( $format->ad_id ); ?>'
                type='checkbox'
                <?php echo (isset($data_auto[$format->ad_id]->status) && $data_auto[$format->ad_id]->status == 'true') ? 'checked' : ''; ?>
                <?php echo $format->tag_actif == 0 ? 'disabled' : '' ?>
            >
        </td>
        <td></td>
    <?php }else if($format->disabled != 'disabled'&&!in_array($format->ad_id, TAG_NO_LAZY_LOADING)){ ?>
        <td id="container_auto_<?php echo esc_attr( $format->ad_id ); ?>"></td>
        <td id="container_lazy_<?php echo esc_attr( $format->ad_id ); ?>">
        <input type="text" hidden id="lazy_data_frequency_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->frequency ) ? $data_lazy[ $format->ad_id ]->frequency : 1 ); ?>"/>
        <input type="text" hidden id="lazy_data_order_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->order ) ? $data_lazy[ $format->ad_id ]->order : 'before' ); ?>"/>
        <input type="text" hidden id="lazy_data_align_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->align ) ? $data_lazy[ $format->ad_id ]->align : 'left' ); ?>"/>
        <input type="text" hidden id="lazy_data_width_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->width ) ? $data_lazy[ $format->ad_id ]->width : $format->ad_size_width ); ?>"/>
        <input type="text" hidden id="lazy_data_height_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->height ) ? $data_lazy[ $format->ad_id ]->height : $format->ad_size_height ); ?>"/>
        <input type="text" hidden id="lazy_data_anchor_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->anchor ) ? $data_lazy[ $format->ad_id ]->anchor : 'p' ); ?>"/>
        <input type="text" hidden id="lazy_data_start_<?php echo esc_attr( $format->ad_id ); ?>"
            value="<?php echo esc_attr( isset( $data_lazy[ $format->ad_id ]->start ) ? $data_lazy[ $format->ad_id ]->start : 0 ); ?>"/>
        
            <div class="col-container">
                <div class="row-container" style="justify-content: center"> 
                    <label style="cursor: default text-align:center" id="label-lazy-<?php echo esc_attr( $format->ad_id ); ?>" for='lazy-<?php echo esc_attr( $format->ad_id ); ?>'><?php _e('Status :', 'themoneytizer'); ?><?php if(isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false'){ echo '<i class="themoneytizer_ico_green bi bi-play-fill"></i>'; }else{ echo '<i class="themoneytizer_ico_red bi bi-pause-fill"></i>'; }?></label>
                    <input style="cursor: default" class="themoneytizer_checkbox checkbox_align themoneytizer_o_1" type="checkbox" readonly
                    id='lazyTagRead-<?php echo esc_attr( $format->ad_id ); ?>' hidden
                    type='checkbox' <?php echo (isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false') ? 'checked' : ''; ?> disabled >
                </div>
                <div class="themoneytizer_button center lazyloading"
                onClick="lazySetup(
                    <?php echo absint( $format->ad_id ); ?>,
                    '<?php echo esc_js( $format->form_name ); ?>'
                )">
                    <?php esc_html_e( 'Configurer', 'themoneytizer' ); ?>
                </div>
            </div>
        </td>
    <?php } else { ?>
        <td id="container_auto_<?php echo esc_attr( $format->ad_id ); ?>"></td>
        <td id="container_lazy_<?php echo esc_attr( $format->ad_id ); ?>"></td>
    <?php } ?>
    <td id="container_tags_<?php echo esc_attr( $format->ad_id ); ?>">
        <div class="themoneytizer_flex_column">
        <?php if ($format->form_state != 0) {?>
            <div>
                <label for='tag_<?php echo esc_attr( $format->ad_id ); ?>'><?php _e('Placement manuel', 'themoneytizer'); ?></label>
                <button type="button" class="themoneytizer_button" onClick="contentToClipBoard('#tag_<?php echo esc_attr( $format->ad_id ); ?>')"><i class="bi bi-clipboard-check"></i></button>
            </div>
            <textarea id="tag_<?php echo esc_attr( $format->ad_id ); ?>" onclick='this.select()' <?php echo $format->tag_actif == 0 ? 'disabled' : ''; ?><?php echo $format->disabled ?>><?php echo $format->tag_name === $format->form_name ? esc_textarea( $format->tag_text_asynch ) : ''; ?></textarea>
        <?php } ?>
        </div>
    </td>
</tr>