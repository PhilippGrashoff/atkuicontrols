<?php

declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

/**
 * List of icon names available via Fomantic-UI (which ships the free
 * Font Awesome 5.15.4 icon set used by Atk4\Ui 6).
 *
 * The names correspond 1:1 to the CSS classes used by Fomantic-UI, e.g.
 * "address book" is rendered as <i class="address book icon"></i>.
 *
 * This is a near-complete copy of the non-brand ("free solid" + "free
 * regular/outline") icons documented at:
 * https://fomantic-ui.com/elements/icon.html
 *
 * Brand icons (e.g. "github", "twitter", "paypal") are intentionally
 * NOT included here, since they behave differently (no "outline" variant)
 * and are rarely relevant for a generic icon-picker use case.
 */
class FontAwesomeIconList
{
    private const RAW = [
        // Basic / interface
        'address book', 'address book outline', 'address card', 'address card outline',
        'adjust', 'align center', 'align justify', 'align left', 'align right', 'archive',
        'arrows alternate', 'arrows alternate horizontal', 'arrows alternate vertical',
        'asterisk', 'at', 'award', 'balance scale', 'balance scale left', 'balance scale right',
        'ban', 'bars', 'bell', 'bell outline', 'bell slash', 'bell slash outline', 'bold',
        'bolt', 'bomb', 'book', 'bookmark', 'bookmark outline', 'briefcase',
        'broadcast tower', 'bug', 'building', 'building outline', 'bullhorn', 'bullseye',
        'calculator', 'calendar', 'calendar alternate', 'calendar alternate outline',
        'calendar check', 'calendar check outline', 'calendar day', 'calendar minus',
        'calendar plus', 'calendar times', 'calendar week', 'camera', 'camera retro',
        'caret down', 'caret left', 'caret right', 'caret square down', 'caret square left',
        'caret square right', 'caret square up', 'caret up', 'certificate', 'chart area',
        'chart bar', 'chart bar outline', 'chart line', 'chart pie', 'check', 'check circle',
        'check circle outline', 'check double', 'check square', 'check square outline',
        'chevron circle down', 'chevron circle left', 'chevron circle right',
        'chevron circle up', 'chevron down', 'chevron left', 'chevron right', 'chevron up',
        'circle', 'circle notch', 'circle outline', 'clipboard', 'clipboard check',
        'clipboard list', 'clipboard outline', 'clock', 'clock outline', 'clone',
        'clone outline', 'close', 'cloud', 'cloud download', 'cloud upload', 'code',
        'code branch', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment alternate',
        'comment alternate outline', 'comment outline', 'comment slash', 'comments',
        'comments outline', 'compass', 'compass outline', 'compress', 'copy', 'copy outline',
        'copyright', 'copyright outline', 'crop', 'crosshairs', 'cube', 'cubes', 'cut',
        'database', 'desktop', 'digital tachograph', 'divide', 'download', 'edit',
        'edit outline', 'ellipsis horizontal', 'ellipsis vertical', 'envelope',
        'envelope open', 'envelope open outline', 'envelope outline', 'equals', 'eraser',
        'ethernet', 'exchange', 'exchange alternate', 'exclamation', 'exclamation circle',
        'exclamation triangle', 'expand', 'expand alternate', 'external alternate',
        'external square alternate', 'eye', 'eye dropper', 'eye outline', 'eye slash',
        'eye slash outline', 'fast backward', 'fast forward', 'fax', 'female', 'file',
        'file alternate', 'file alternate outline', 'file archive', 'file archive outline',
        'file audio', 'file audio outline', 'file code', 'file code outline', 'file excel',
        'file excel outline', 'file image', 'file image outline', 'file outline', 'file pdf',
        'file pdf outline', 'file powerpoint', 'file powerpoint outline', 'file video',
        'file video outline', 'file word', 'file word outline', 'film', 'filter', 'fire',
        'flag', 'flag checkered', 'flag outline', 'flask', 'folder', 'folder open',
        'folder open outline', 'folder outline', 'font', 'gas pump', 'gavel', 'gem',
        'gem outline', 'gift', 'globe', 'graduation cap', 'greater than',
        'greater than equal', 'hand point down', 'hand point left', 'hand point right',
        'hand point up', 'handshake', 'handshake outline', 'hashtag', 'headphones', 'heart',
        'heart broken', 'heart outline', 'heartbeat', 'history', 'home', 'hourglass',
        'hourglass end', 'hourglass half', 'hourglass outline', 'hourglass start',
        'i cursor', 'id badge', 'id badge outline', 'id card', 'id card alternate',
        'id card outline', 'image', 'image outline', 'images', 'images outline', 'inbox',
        'indent', 'industry', 'infinity', 'info', 'info circle', 'italic', 'key', 'keyboard',
        'keyboard outline', 'landmark', 'language', 'laptop', 'leaf', 'less than',
        'less than equal', 'lightbulb', 'lightbulb outline', 'link', 'lira sign', 'list',
        'list alternate', 'list alternate outline', 'list ol', 'list ul', 'location arrow',
        'lock', 'lock open', 'long arrow alternate down', 'long arrow alternate left',
        'long arrow alternate right', 'long arrow alternate up', 'low vision', 'magic',
        'magnet', 'male', 'map', 'map marked', 'map marked alternate', 'map marker',
        'map marker alternate', 'map outline', 'map pin', 'map signs', 'mars', 'medkit',
        'meh', 'meh outline', 'microchip', 'microphone', 'microphone alternate',
        'microphone alternate slash', 'microphone slash', 'minus', 'minus circle',
        'minus square', 'minus square outline', 'mobile', 'mobile alternate',
        'money bill', 'money bill alternate', 'money bill alternate outline',
        'money bill wave', 'money bill wave alternate', 'money check',
        'money check alternate', 'monument', 'moon', 'moon outline', 'mountain',
        'newspaper', 'newspaper outline', 'not equal', 'outdent', 'paint brush',
        'paint roller', 'paperclip', 'paragraph', 'parking', 'paste', 'pause',
        'pause circle', 'pause circle outline', 'pen', 'pen alternate', 'pen fancy',
        'pen nib', 'pen square', 'pencil alternate', 'pencil ruler', 'percent',
        'percentage', 'phone', 'phone alternate', 'phone slash', 'phone square',
        'phone volume', 'photo video', 'play', 'play circle', 'play circle outline',
        'plug', 'plus', 'plus circle', 'plus square', 'plus square outline', 'podcast',
        'poll', 'poll horizontal', 'power off', 'print', 'project diagram', 'puzzle piece',
        'qrcode', 'question', 'question circle', 'question circle outline', 'quote left',
        'quote right', 'random', 'receipt', 'recycle', 'redo', 'redo alternate',
        'registered', 'repeat', 'reply', 'reply all', 'retweet', 'road', 'rocket', 'route',
        'rss', 'rss square', 'ruler', 'ruler combined', 'ruler horizontal',
        'ruler vertical', 'satellite', 'satellite dish', 'save', 'save outline',
        'sd card', 'search', 'search minus', 'search plus', 'server', 'share',
        'share alternate', 'share alternate square', 'share square', 'share square outline',
        'shield alternate', 'sign in alternate', 'sign out alternate', 'signal',
        'sim card', 'sitemap', 'sliders horizontal', 'slash', 'smile', 'smile outline',
        'sort', 'sort alphabet down', 'sort alphabet up', 'sort amount down',
        'sort amount up', 'sort down', 'sort numeric down', 'sort numeric up', 'sort up',
        'spinner', 'square', 'square full', 'square outline', 'square root alternate',
        'stamp', 'star', 'star half', 'star half alternate', 'star half outline',
        'star outline', 'stethoscope', 'sticky note', 'sticky note outline', 'stop',
        'stop circle', 'stop circle outline', 'stopwatch', 'store', 'store alternate',
        'store alternate slash', 'store slash', 'stream', 'street view', 'strikethrough',
        'subscript', 'sun', 'sun outline', 'superscript', 'sync', 'sync alternate',
        'table', 'tablet', 'tablet alternate', 'tachometer alternate', 'tag', 'tags',
        'tasks', 'terminal', 'text height', 'text width', 'th', 'th large', 'th list',
        'thermometer', 'thermometer full', 'thumbs down', 'thumbs down outline',
        'thumbs up', 'thumbs up outline', 'thumbtack', 'ticket alternate', 'times',
        'times circle', 'times circle outline', 'tint', 'toggle off', 'toggle on',
        'trademark', 'trash', 'trash alternate', 'trash alternate outline', 'tree',
        'trophy', 'truck', 'tty', 'tv', 'umbrella', 'underline', 'undo', 'undo alternate',
        'universal access', 'unlink', 'unlock', 'unlock alternate', 'upload', 'user',
        'user alternate', 'user alternate slash', 'user astronaut', 'user check',
        'user circle', 'user circle outline', 'user clock', 'user cog', 'user edit',
        'user friends', 'user graduate', 'user injured', 'user lock', 'user md',
        'user minus', 'user ninja', 'user nurse', 'user outline', 'user plus',
        'user secret', 'user shield', 'user slash', 'user tag', 'user tie', 'user times',
        'users', 'users cog', 'users slash', 'utensils', 'volume down', 'volume mute',
        'volume off', 'volume up', 'wallet', 'wave square', 'weight', 'wheelchair',
        'wifi', 'wind', 'window close', 'window close outline', 'window maximize',
        'window maximize outline', 'window minimize', 'window minimize outline',
        'window restore', 'window restore outline', 'wrench',

        // Accessibility
        'american sign language interpreting', 'assistive listening systems',
        'audio description', 'blind', 'braille', 'closed captioning',
        'closed captioning outline', 'deaf', 'deafness', 'hard of hearing',
        'sign language',

        // Chess
        'chess', 'chess bishop', 'chess board', 'chess king', 'chess knight',
        'chess pawn', 'chess queen', 'chess rook',

        // Childhood / hands
        'baby', 'baby carriage', 'biking', 'football ball', 'gamepad',
        'allergies', 'fist raised', 'hand holding', 'hand holding heart',
        'hand holding medical', 'hand holding usd', 'hand holding water', 'hand lizard',
        'hand lizard outline', 'hand middle finger', 'hand paper', 'hand paper outline',
        'hand peace', 'hand peace outline', 'hand point down outline',
        'hand point left outline', 'hand point right outline', 'hand point up outline',
        'hand pointer', 'hand pointer outline', 'hand rock', 'hand rock outline',
        'hand scissors', 'hand scissors outline', 'hand spock', 'hand spock outline',
        'hands', 'hands helping',

        // Currency
        'bitcoin', 'btc', 'dollar sign', 'ethereum', 'euro sign', 'pound sign',
        'ruble sign', 'rupee sign', 'shekel sign', 'won sign', 'yen sign',

        // Construction
        'brush', 'drafting compass', 'dumpster', 'hammer', 'hard hat', 'screwdriver',
        'toolbox', 'tools', 'truck pickup',

        // Emoji / faces
        'angry', 'dizzy', 'flushed', 'frown', 'frown open', 'grimace', 'grin',
        'grin alternate', 'grin beam', 'grin beam sweat', 'grin hearts', 'grin squint',
        'grin squint tears', 'grin stars', 'grin tears', 'grin tongue',
        'grin tongue squint', 'grin tongue wink', 'grin wink', 'kiss', 'kiss beam',
        'kiss wink heart', 'laugh', 'laugh beam', 'laugh squint', 'laugh wink',
        'meh blank', 'meh rolling eyes', 'sad cry', 'sad tear', 'smile beam',
        'smile wink', 'surprise', 'tired',

        // Fitness / sports
        'burn', 'fire alternate', 'hiking', 'running', 'shoe prints', 'skating',
        'skiing', 'skiing nordic', 'snowboarding', 'spa', 'swimmer', 'walking',
        'baseball ball', 'basketball ball', 'bowling ball', 'dumbbell', 'futbol',
        'futbol outline', 'golf ball', 'hockey puck', 'quidditch', 'table tennis',
        'volleyball ball',

        // Food
        'bacon', 'bone', 'bread slice', 'candy cane', 'carrot', 'cheese',
        'cloud meatball', 'cookie', 'cookie bite', 'drumstick bite', 'egg', 'fish',
        'glass cheers', 'glass martini', 'glass martini alternate', 'hamburger',
        'hotdog', 'ice cream', 'lemon', 'pepper hot', 'pizza slice', 'seedling',
        'wine bottle', 'wine glass', 'wine glass alternate',

        // Gaming
        'dice', 'dice d20', 'dice d6', 'dice five', 'dice four', 'dice one', 'dice six',
        'dice three', 'dice two', 'ghost', 'headset', 'playstation', 'steam',
        'steam square', 'steam symbol', 'twitch', 'xbox',

        // Genders
        'genderless', 'mars double', 'mars stroke', 'mars stroke horizontal',
        'mars stroke vertical', 'mercury', 'neuter', 'transgender',
        'transgender alternate', 'venus', 'venus double', 'venus mars',

        // Halloween
        'book dead', 'broom', 'cat', 'cloud moon', 'crow', 'hat wizard', 'mask',
        'skull crossbones', 'spider', 'toilet paper',

        // Holiday
        'gifts', 'holly berry', 'mug hot', 'sleigh', 'snowman',

        // Hotel / household
        'bath', 'bed', 'car', 'cocktail', 'concierge bell', 'door closed', 'door open',
        'hot tub', 'hotel', 'luggage cart', 'shower', 'shuttle van', 'smoking',
        'smoking ban', 'snowflake', 'snowflake outline', 'suitcase',
        'suitcase rolling', 'swimming pool', 'umbrella beach',
        'blender', 'box tissue', 'chair', 'couch', 'dungeon', 'fan', 'faucet',
        'fire extinguisher', 'house damage', 'oil can', 'poop', 'ring', 'sink',
        'snowplow', 'soap', 'spray can', 'toilet',

        // Logistics
        'box', 'boxes', 'dolly', 'dolly flatbed', 'pallet', 'shipping fast',
        'warehouse',

        // Mathematics
        'wave square',

        // Medical
        'bacteria', 'bacterium', 'band aid', 'biohazard', 'bong', 'book medical',
        'brain', 'briefcase medical', 'cannabis', 'capsules', 'clinic medical',
        'disease', 'file medical', 'file prescription', 'first aid', 'hospital',
        'hospital outline', 'hospital symbol', 'joint', 'laptop medical',
        'mortar pestle', 'notes medical', 'pills', 'prescription', 'prescription bottle',
        'prescription bottle alternate', 'syringe', 'tablets', 'vial', 'vials',
        'x ray', 'dna',

        // Music
        'compact disc', 'drum', 'drum steelpan', 'guitar', 'music', 'record vinyl',

        // Nature
        'feather', 'feather alternate', 'paw',

        // Political
        'democrat', 'donate', 'dove', 'flag usa', 'person booth', 'piggy bank',
        'republican', 'vote yea',

        // Religion
        'ankh', 'atom', 'bahai', 'bible', 'church', 'cross', 'dharmachakra',
        'gopuram', 'hamsa', 'hanukiah', 'jedi', 'journal whills', 'kaaba', 'khanda',
        'menorah', 'mosque', 'om', 'pastafarianism', 'peace', 'place of worship',
        'pray', 'praying hands', 'quran', 'star and crescent', 'star of david',
        'synagogue', 'torah', 'torii gate', 'vihara',

        // Security
        'fingerprint', 'passport', 'user lock',

        // Shapes
        'shapes',

        // Shopping / payments
        'alipay', 'amazon pay', 'apple pay', 'cart arrow down', 'cart plus',
        'cash register', 'cc amazon pay', 'cc amex', 'cc apple pay', 'cc diners club',
        'cc discover', 'cc jcb', 'cc mastercard', 'cc paypal', 'cc stripe', 'cc visa',
        'credit card', 'credit card outline', 'shopping bag', 'shopping basket',
        'shopping cart', 'tshirt',

        // Spinners
        'crosshairs', 'life ring', 'life ring outline', 'palette', 'stroopwafel',
        'yin yang',

        // Spring / weather
        'cloud sun', 'cloud sun rain', 'frog', 'rainbow',
        'cloud moon rain', 'cloud rain', 'cloud showers heavy', 'meteor',
        'poo storm', 'smog', 'temperature high', 'temperature low', 'water',

        // Status
        'battery empty', 'battery full', 'battery half', 'battery quarter',
        'battery three quarters',

        // Toggle
        'dot circle', 'dot circle outline',

        // Transportation / vehicles
        'accessible', 'ambulance', 'anchor', 'archway', 'atlas', 'bicycle', 'bus',
        'bus alternate', 'car alternate', 'car crash', 'car side', 'caravan',
        'fighter jet', 'globe africa', 'globe americas', 'globe asia', 'globe europe',
        'helicopter', 'horse', 'motorcycle', 'paper plane', 'paper plane outline',
        'plane', 'plane arrival', 'plane departure', 'ship', 'space shuttle',
        'subway', 'taxi', 'tractor', 'train', 'tram', 'truck monster',

        // Users & people
        'chalkboard teacher', 'child', 'people arrows', 'people carry', 'portrait',
        'restroom',

        // Writing
        'fountain pen', 'highlighter', 'marker', 'signature',
    ];

    private static ?array $all = null;

    /**
     * @return array<int, string> unique, sorted icon names
     */
    public static function all(): array
    {
        if (self::$all === null) {
            $unique = array_values(array_unique(self::RAW));
            sort($unique);

            self::$all = $unique;
        }

        return self::$all;
    }
}