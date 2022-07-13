<?php

$request = wp_remote_get('https://www.altstadt-kult.de/service/current-table');

if( is_wp_error( $request ) ) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode($body);

$tableObject = $data->table;

?>

<div class="sp-block-league-table">

    <table class="sp-league-table has-box-shadow">

        <thead class="sp-league-table__head">
        <th>#</th>
        <th class="sp-league-table__logo text-center"></th>
        <th class="text-left">Mannschaft</th>
        <th class="sp-league-table__games text-center">Sp.</th>
        <th class="sp-league-table__record text-center">S–U–N</th>
        <th class="sp-league-table__goals text-center">Tore</th>
        <th class="sp-league-table__diff">Diff</th>
        <th>Pkt</th>

        </thead>

        <?php

        $rowCounter = 1;

        foreach ($tableObject as $tableRowObject) { ?>

            <?php $team_id = $tableRowObject->team_id;

            $teamObject = get_posts(array(
                'numberposts' => 1,
                'post_type' => 'sp_team',
                'meta_key' => 'altkult_id',
                'meta_value' => $team_id
            ))[0];

            $shortName = get_post_meta($teamObject->ID)['sp_short_name'][0];

            $teamLogoSrc = get_sp_team_logo_url($teamObject->ID, 'logo-icon');
            $backgroundColor = '';

            switch (true) {
                case $team_id == 1:
                    $hasBackgroundColor = true;
                    $backgroundColor = 'primary';
                    break;
                case $rowCounter < 4:
                    $hasBackgroundColor = true;
                    $backgroundColor = 'light-grey';
                    break;
                case $rowCounter > 16 :
                    $hasBackgroundColor = true;
                    $backgroundColor = 'medium-grey';
                    break;
                default :
                    $hasBackgroundColor= false;
            }

            $backgroundColor = ' has-' . $backgroundColor . '-background-color';

            ?>

            <tr class="sp-league-table__row<?php echo ($hasBackgroundColor)?$backgroundColor:'' ?>">

                <td class="sp-league-table__rank text-right"><?php echo $tableRowObject->rank ?></td>
                <td class="sp-league-table__logo text-center"><img class="" src="<?php echo $teamObject?$teamLogoSrc:$tableRowObject->wappen ?>" alt="" width="40" height="40"></td>
                <td class="sp-league-table__team"><?php echo $teamObject?$teamObject->post_title:$tableRowObject->name ?></td>
                <td class="sp-league-table__short"><?php echo $shortName?$shortName:$tableRowObject->kurzform ?></td>
                <td class="sp-league-table__games text-center"><?php echo $tableRowObject->num_games ?></td>
                <td class="sp-league-table__record text-center"><?php echo $tableRowObject->win . '–' . $tableRowObject->draw . '–' . $tableRowObject->lost ?></td>
                <td class="sp-league-table__goals text-center"><?php echo $tableRowObject->goals_for . ':' . $tableRowObject->goals_against  ?></td>
                <td class="sp-league-table__diff text-right"><?php echo $tableRowObject->difference ?></td>
                <td class="sp-league-table__points text-right"><?php echo $tableRowObject->points ?></td>

            </tr>

            <?php

            $rowCounter++;
        } ?>

        <tfoot>

        <tr class="sp-league-table__row has-primary-background-color">
            <td colspan="12" class="sp-league-table__date text-right">Stand <?php echo date_i18n('d. F Y', strtotime($data->date)) ?></td>
        </tr>

        </tfoot>

    </table>

</div>