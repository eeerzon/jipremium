<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * Kreen event & ticket IDs and registration dates for the active JIPREMIUM event.
 * Change the values here when a new event/ticket/period is used; the registration
 * controllers (Visitor/Buyer, Online/Onsite) and the Visit page read them from this file.
 */
class JipremiumEvent
{
    // Visitor event (VisitorOnlineController & VisitorOnsiteController)
    //2026
    const VISITOR_EVENT_ID = 'HJUQPPJEBJGJNSOBH299';
    const VISITOR_ONLINE_TICKET_ID = 'JZECYWAHYMGADUGYA296';
    const VISITOR_ONSITE_TICKET_ID = 'MWTDIHYJJJWLQFBTF943';

    // Buyer event (BuyerOnlineController & BuyerOnsiteController)
    //2026
    const BUYER_EVENT_ID = 'FWSCMNHJGCBHYDJOQ961';
    const BUYER_ONLINE_TICKET_ID = 'EVJXATXONKBKNDZTP807';
    const BUYER_ONSITE_TICKET_ID = 'CHCAFVPCJXRVBNNCQ764';

    // Registration dates (format: Y-m-d H:i:s, timezone below)
    //2026
    const TIMEZONE = 'Asia/Jakarta';

    // Online registration (visitor & buyer) closes after this moment;
    // the online forms then redirect to onsite and the Visit page hides the online button.
    const ONLINE_REGISTRATION_DEADLINE = '2026-12-02 00:00:01';

    // Onsite registration button on the Visit page is shown between these two moments.
    const ONSITE_REGISTRATION_OPEN = '2026-09-03 00:00:00';
    const ONSITE_REGISTRATION_CLOSE = '2026-12-06 23:00:00';

    // Where the registration buttons on the Visit page go.

    // Use a route name (e.g. 'visitor_onsite.create') 
    // or a full URL (e.g. 'https://kreenconnect.com/...').
    // https://kreenconnect.com/ticket-event/buyer-registration--jipremium-2026

    // A full URL opens in a new tab.
    //2026
    const DESKTOP_VISITOR_ONLINE_LINK = 'visitor_online.create';
    const DESKTOP_BUYER_ONLINE_LINK = 'buyer_online.create';
    const DESKTOP_VISITOR_ONSITE_LINK = 'visitor_onsite.create';
    const DESKTOP_BUYER_ONSITE_LINK = 'buyer_onsite.create';

    // Mobile follows desktop by default; put a route name or URL here to make mobile different.
    const MOBILE_VISITOR_ONLINE_LINK = self::DESKTOP_VISITOR_ONLINE_LINK;
    const MOBILE_BUYER_ONLINE_LINK = self::DESKTOP_BUYER_ONLINE_LINK;
    const MOBILE_VISITOR_ONSITE_LINK = self::DESKTOP_VISITOR_ONSITE_LINK;
    const MOBILE_BUYER_ONSITE_LINK = self::DESKTOP_BUYER_ONSITE_LINK;

    public static function registrationUrl(string $link): string
    {
        return self::isExternalLink($link) ? $link : route($link);
    }

    public static function isExternalLink(string $link): bool
    {
        return (bool) preg_match('#^https?://#i', $link);
    }

    public static function onlineRegistrationDeadline(): Carbon
    {
        return Carbon::parse(self::ONLINE_REGISTRATION_DEADLINE, self::TIMEZONE);
    }

    public static function onsiteRegistrationOpen(): Carbon
    {
        return Carbon::parse(self::ONSITE_REGISTRATION_OPEN, self::TIMEZONE);
    }

    public static function onsiteRegistrationClose(): Carbon
    {
        return Carbon::parse(self::ONSITE_REGISTRATION_CLOSE, self::TIMEZONE);
    }
}
