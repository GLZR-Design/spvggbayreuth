<?php 

function render_event_block($gameEventObject, $header = true, $links = true, $inline = true, $size = "regular") {
    $prefix = $GLOBALS['sp-block-namespace'] . '-event-block';
    $venue = $gameEventObject->venue;
    $dateIso = $gameEventObject->date;
    $dayOfWeek = date( "l", strtotime($dateIso) );
	$date = date_i18n('d. F Y', strtotime($dateIso));
//     $date = date( "d. F Y", strtotime($dateIso) );
    $time = date( "H:i", strtotime($dateIso) );
    $competition = $gameEventObject->details->competition;
    $result = $gameEventObject->result;
    $matchday = $gameEventObject->details->matchday;
    $homeName = $gameEventObject->teams[0]->name;
    $homeLogo = $gameEventObject->teams[0]->logo;
    $guestName = $gameEventObject->teams[1]->name;
    $guestLogo = $gameEventObject->teams[1]->logo;

    $quotes = function_render_event_block_button($gameEventObject->articles->quotes, "<i class=\"fas fa-comment\"></i> Stimmen zum Spiel", "primary");
    $report = function_render_event_block_button($gameEventObject->articles->report, "<i class=\"fas fa-newspaper\"></i> Spielbericht", );
    $preview = function_render_event_block_button($gameEventObject->articles->preview, "<i class=\"fas fa-eye\"></i> Vorschau", "primary");
    $tickets = function_render_event_block_button($gameEventObject->tickets, "<i class=\"fas fa-ticket-alt\"></i> Tickets");

    // $links = $gameEventObject->articles;
//     $anyLink = $quotes || $report || $preview) || $tickets;
//     $articles = $anyLink ? "<div class='{$prefix}__articles'>{$report}{$preview}{$quotes}{$tickets}</div>":"";
	$articles = "<div class='{$prefix}__articles'>{$report}{$preview}{$quotes}{$tickets}</div>";
    $links = $links ? "<div class='{$prefix}__links'>{$articles}</div>":"";

    $resultContent = $result?"{$result->home}:{$result->guest}":"-:-";

    $eventRound = is_numeric($matchday)?$matchday . '. Spieltag':$matchday;
    $title = "            <p class='{$prefix}__title'><span>{$competition}</span>{$eventRound}</p>";
    $header = ($header)?"
        <div class='{$prefix}__info'>
            <p class='{$prefix}__date'><i class=\"far fa-calendar-alt\"></i><time datetime='{$dateIso}'>{$date}</time></p>
            <p class='{$prefix}__time'><i class=\"far fa-clock\"></i>{$time} Uhr</time></p>
            <p class='{$prefix}__venue'><a href='{$venue->link}'><i class=\"fas fa-map-marker-alt\"></i>{$venue->name}</a></p>
        </div>":"";

    $homeLogoBlock = render_logo_block($homeName, $homeLogo, true, $inline);
    $guestLogoBlock = render_logo_block($guestName, $guestLogo, true, $inline);
    $inlineClass = ($inline)?" {$prefix}__wrapper--inline":"";

    return "<div class='{$prefix}'>{$title}<div class='{$prefix}__wrapper {$inlineClass}'>{$homeLogoBlock}<span class='{$prefix}__result'>{$resultContent}</span>{$guestLogoBlock}</div>{$header}{$links}</div>";
}