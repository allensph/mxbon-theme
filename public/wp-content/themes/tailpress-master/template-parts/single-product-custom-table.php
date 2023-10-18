<?php
    global $layout, $images_uri;
    $table = $layout['single_table'];
?>

<?php if ( ! empty ( $table ) ) : ?>

    <?php if ( ! empty( $table['caption'] ) ) : ?>

        <h2><?php echo $table['caption']; ?></h2>

    <?php endif; ?>

    <div class="table-wrapper">
        <table>

            <?php if ( ! empty( $table['header'] ) ) : ?>

                <thead>
                    <tr>
                        <?php foreach ( $table['header'] as $th ) : ?>
                            <th><?php echo str_replace( "|", "<br>", $th['c'] ); ?></th>
                    <?php endforeach; ?>
                    </tr>
                </thead>

            <?php endif; ?>

            <tbody>

                <?php foreach ( $table['body'] as $tr ) : ?>
                    <tr>
                        <?php foreach ( $tr as $td ) : ?>
                            <td>
                                <?php if( $td['c'] === 'V' ) : ?>
                                    <span class="check"></span>
                                <?php else : ?>
                                    <?php echo str_replace( "|", "<br>", $td['c'] ); ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
    </div>

<?php endif; ?>