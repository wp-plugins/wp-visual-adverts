<?php 
    $options = RPAdv()->getSettings()->getOptions();
?>

<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Advert Settings</h2>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php settings_fields( 'rpadv-settings' ); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Advert Image Size</th>
                    <td>
                        <label for="rpadv_settings[rpadv-image-width]">Width</label>
                        <input min="0" step="1" type="number" class="small-text" name="rpadv_settings[rpadv-image-width]" value="<?php echo (isset($options['rpadv-image-width'])) ? $options['rpadv-image-width'] : '' ; ?>"  />                        
                        <label for="rpadv_settings[rpadv-image-height]">Height</label>                        
                        <input min="0" step="1" type="number" class="small-text" name="rpadv_settings[rpadv-image-height]" value="<?php echo (isset($options['rpadv-image-height'])) ? $options['rpadv-image-height'] : '' ; ?>"  />
                        <input type="checkbox" value="1" name="rpadv_settings[rpadv-image-crop]" <?php echo checked( 1, (isset($options['rpadv-image-crop'])) ? $options['rpadv-image-crop'] : '' , false ); ?> >
                        <label for="rpadv_settings[rpadv-image-crop]">Crop thumbnail to exact dimensions</label>                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">Refresh Time</th>
                    <td>
                        <input min="0" step="1" type="number" class="text" name="rpadv_settings[rpadv-refresh-time]" value="<?php echo (isset($options['rpadv-refresh-time'])) ? $options['rpadv-refresh-time'] : '' ; ?>"  />                                                
                        ms.
                    </td>
                </tr>
                <tr>
                    <th scope="row">Animation Speed</th>
                    <td>
                        <input min="0" step="1" type="number" class="text" name="rpadv_settings[rpadv-animation-speed]" value="<?php echo (isset($options['rpadv-animation-speed'])) ? $options['rpadv-animation-speed'] : '' ; ?>"  />                                                
                        ms.
                    </td>
                </tr>                
                <tr>
                    <th scope="row">Advert Count</th>
                    <td>
                        <input min="0" step="1" type="number" class="text" name="rpadv_settings[rpadv-advert-count]" value="<?php echo (isset($options['rpadv-advert-count'])) ? $options['rpadv-advert-count'] : '' ; ?>"  />                                                
                    </td>
                </tr>                
            </tbody>
        </table>
        
        <?php submit_button(); ?>
        
    </form>
</div>
