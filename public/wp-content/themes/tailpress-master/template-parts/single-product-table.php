<?php
    global $layout, $layout_name, $product_models, $product_colors, $images_uri;
    
    $table = $layout[$layout_name];
    
    

    //echo "<pre>" . print_r( $table['header'], true ) . "</pre>";

    if ( ! empty( $table['header'] ) ) :

        // Add the Color column

        $body_row_index = 0;

        $table_header = array();

        if( $layout_name === 'specialties' && !empty( $product_colors) ) :
            $table_header = array_merge(
                array_slice($table['header'], 0, 1), 
                array( ['c' => '外觀顏色'] ), 
                array_slice($table['header'], 1, null)        
            );
        else:
            $table_header = $table['header'];
        endif;


        // Header & Subheader

        $table_subheader = array(); 
        $td_tobe_removed = array();
        $match_count = 0;

        foreach( $table_header as $key => $th ) {
            
            preg_match( '/\{(.*)\}\:(\d.*)/' , $th['c'], $matches );

            if( !$matches ) {
                // Empty th in subheader
                $table_subheader[] = array( 'c' => '' );

            } else {

                // Colspan th in header
                $table_header[$key] = array( 'c' => $matches[1], 'colspan' => $matches[2] );
                
                // Removable td indexes in tbody
                $td_tobe_removed[] = !empty( $product_colors) ? $key : $key-1 ;

                for( $i = $key+1 ; $i <= $key+$matches[2] ; $i++ ) {
                    // Main content th in subheader
                    $table_subheader[] = $table_header[$i];

                    // Remove those th apear in subheader from header
                    unset($table_header[$i]);
                }
                
                $match_count++;
            }
        }

        if( $match_count === 0 ) {
            $table_subheader = array();
        } 

    endif;
?>

<?php if ( ! empty ( $table ) ) : ?>

    <div class="table-wrapper">
        <table>

            <?php if ( ! empty( $table_header ) ) : ?>

                <thead <?php echo $table_subheader ? 'class="span-header"' : ''; ?>>
                    <tr>
                        <?php foreach ( $table_header as $key => $th ) : ?>
                            <?php
                                $colspan =  array_key_exists( 'colspan', $th) ? "colspan=\"{$th['colspan']}\"" : '';
                                $rowspan = !array_key_exists( 'colspan', $th) && $table_subheader ? "rowspan=\"2\"" : '';
                            ?>
                            <th <?php echo $colspan . " " . $rowspan; ?>>
                                <?php echo str_replace( "|", "<br>", $th['c'] ); ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>

                    <?php if( $table_subheader ) : ?>
                    <tr>
                        <?php foreach ( $table_subheader as $key => $th ) : ?>
                            <?php if( $th['c'] ): ?>
                                <th><?php echo str_replace( "|", "<br>", $th['c'] ); ?></th>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr> 
                    <?php endif; ?>
                </thead>

            <?php endif; ?>

            <tbody>

                <?php foreach ( $table['body'] as $tr ) : ?>

                    <?php if( $layout_name === 'specialties' ) : ?>

                        <?php if( in_array( $tr[0]['c'], $product_models ) ) : ?>

                            <?php
                                
                                if( !empty( $product_colors) ) :
                                    
                                    $color_icon = $product_colors[$body_row_index]['hex'] 
                                        ? "<i class=\"fa-solid fa-bottle-water\" style=\"color: {$product_colors[$body_row_index]['hex']}\"></i>"
                                        : '';

                                    $color_content = $color_icon . $product_colors[$body_row_index]['color'];

                                    $table_row = array_merge(
                                        array_slice($tr, 0, 1),
                                        array( [ 'c' => $color_content ] ), 
                                        array_slice($tr, 1, null)
                                    );
                                endif;

                                $body_row_index++;
                            ?>
                            <tr>
                                <?php foreach ( $table_row as $key => $td ) : ?>
                                    
                                    <?php if( $td['c'] === 'V' ) : ?>
                                        <td><span class="check"></span></td>
                                    <?php elseif( !in_array( $key, $td_tobe_removed ) ) : ?>
                                        <td><?php echo str_replace( "|", "<br>", $td['c'] ); ?></td>
                                    <?php endif; ?>
                                    
                                <?php endforeach; ?>
                            </tr>
                            
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if( $layout_name === 'single_table' ) : ?>
                        <tr>
                            <?php foreach ( $tr as $key => $td ) : ?>
                                
                                <?php if( $td['c'] === 'V' ) : ?>
                                    <td><span class="check"></span></td>
                                <?php elseif( !in_array( $key, $td_tobe_removed ) ) : ?>
                                    <td><?php echo str_replace( "|", "<br>", $td['c'] ); ?></td>
                                <?php endif; ?>
                                
                            <?php endforeach; ?>
                        </tr>
                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>

        </table>
    </div>
<?php endif; ?>

<?php //echo "<pre>" . print_r($table_subheader, true) . "</pre>"; ?>

<?php //echo empty($table_subheader) ? 'true' : 'false'; ?>