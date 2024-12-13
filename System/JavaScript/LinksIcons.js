function HandleLinkIcon(Link) {
    try {
        let ParsedUrl = new URL(Link);
        let Domain = '.' + ParsedUrl.hostname; // Добавляем точку перед доменом
        let Parts = Domain.split('.');
        let DomainDot = Parts[1];
        let ElementLogo = '<img src="/System/Images/Links/Element.svg">';
        let TLink = $('head').find('#THEME');
        if (TLink.length > 0) {
            let StyleFilePath = TLink.attr('href');
            let StyleFile = StyleFilePath.split('/').pop();
            let Theme = Themes.find(function (Theme) {
                return Theme.StyleFile === StyleFile;
            });
            if (Theme.ID == 'Dark') {
                ElementLogo = '<img src="/System/Images/Links/ElementDark.svg">';
            }
        }
        if (DomainDot === 'onion') {
            return '<img src="/System/Images/Links/Onion.svg">';
        } else {
            switch (Domain) {
                case '.elemsocial.com':
                    return ElementLogo;
                case '.youtube.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/YouTube.svg">';
                case '.tiktok.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/TikTok.svg">';
                case '.steamcommunity.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/Steam.svg">';
                case '.github.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/GitHub.svg">';
                case '.t.me':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/Telegram.svg">';
                case '.vk.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/VK.svg">';
                case '.open.spotify.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/Spotify.svg">';
                case '.donationalerts.com':
                    return '<img class="custom-icon" src="https://elemsocial.com/System/Images/Links/DonationAlerts.svg">';
                default:
                    return '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2m-5.15 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56m-.25-5.56h-4.68c-.1-.66-.16-1.32-.16-2s.06-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2m-2.34 5.96c-.83-1.2-1.5-2.53-1.91-3.96h3.82c-.41 1.43-1.08 2.76-1.91 3.96m-4-11.96h-2.92c.95-1.66 2.49-2.94 4.32-3.56-.6 1.11-1.05 2.31-1.4 3.56m-2.92 8h2.92c.35 1.25.8 2.45 1.4 3.56-1.83-.63-3.37-1.91-4.32-3.56m-.82-2c-.16-.64-.26-1.31-.26-2s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2m4.36-9.97c.83 1.2 1.5 2.54 1.91 3.97h-3.82c.41-1.43 1.08-2.77 1.91-3.97m6.92 3.97h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.9 4.33 3.56m-6.92-6c-5.53 0-10 4.5-10 10a10 10 0 0 0 10 10 10 10 0 0 0 10-10 10 10 0 0 0 -10-10z"/></svg>';
            }
        }
    } catch {
        return '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2m-5.15 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56m-.25-5.56h-4.68c-.1-.66-.16-1.32-.16-2s.06-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2m-2.34 5.96c-.83-1.2-1.5-2.53-1.91-3.96h3.82c-.41 1.43-1.08 2.76-1.91 3.96m-4-11.96h-2.92c.95-1.66 2.49-2.94 4.32-3.56-.6 1.11-1.05 2.31-1.4 3.56m-2.92 8h2.92c.35 1.25.8 2.45 1.4 3.56-1.83-.63-3.37-1.91-4.32-3.56m-.82-2c-.16-.64-.26-1.31-.26-2s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2m4.36-9.97c.83 1.2 1.5 2.54 1.91 3.97h-3.82c.41-1.43 1.08-2.77 1.91-3.97m6.92 3.97h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.9 4.33 3.56m-6.92-6c-5.53 0-10 4.5-10 10a10 10 0 0 0 10 10 10 10 0 0 0 10-10 10 10 0 0 0 -10-10z"/></svg>';
    }
}

$(document).ready(function() {
    $('.custom-container a').each(function() {
        let link = $(this).attr('href');
        let icon = HandleLinkIcon(link);
        $(this).prepend(icon);
    });
});
