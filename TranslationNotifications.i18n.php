<?php
/**
 * Translations for the translator outreach features.
 *
 * @file
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$messages = array();

/** English
 * @author Niklas Laxström
 * @author Amire80
 */
$messages['en'] = array(
	'translatorsignup' => 'Translator signup',
	'translatorsignup-summary' => 'Use this page to indicate what languages you can translate in, and how you want to be contacted about new translation requests.',
	'translationnotifications-desc' => 'Allows translators to sign up for translation notifications',
	'translationnotifications-info' => 'User information',
	'translationnotifications-username' => 'Username:',
	'translationnotifications-emailstatus' => 'Email status:',
	'translationnotifications-email-confirmed' => 'Your email address is confirmed',
	'translationnotifications-email-disablemail' => 'Your email address is confirmed, but in [[Special:Preferences|your preferences]] you asked not to receive email.',
	'translationnotifications-email-unconfirmed' => 'Your email address is not confirmed. $1',
	'translationnotifications-email-notset' => 'You have not provided an email address. You can do that in your [[Special:Preferences|preferences]].',
	'translationnotifications-languages' => 'Languages',
	'translationnotifications-lang' => 'Language #$1',
	'translationnotifications-nolang' => 'Choose a language',
	'translationnotifications-contact' => 'Preferred contact methods',
	'translationnotifications-cmethod-email' => 'Email',
	'translationnotifications-cmethod-talkpage' => 'Talk page',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Talk page on other wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Contact frequency',
	'translationnotifications-freq-always' => 'When there is something new to translate',
	'translationnotifications-freq-week' => 'At most once a week',
	'translationnotifications-freq-month' => 'At most once a month',
	'translationnotifications-freq-weekly' => 'Weekly digest',
	'translationnotifications-freq-monthly' => 'Monthly digest',
	'translationnotifications-submit' => 'Update settings',
	'translationnotifications-signup-success' => "Your translation notification preferences were saved.",

	// Special:Notify translators
	'notifytranslators' => 'Notify translators',
	'translationnotifications-submit-ok' => 'Notifications have been added to a queue and are delivered by a background job.',
	'translationnotifications-send-notification-button' => 'Send a notification to translators',
	'translationnotifications-deadline-label' => 'Deadline to indicate in this notification:',
	'translationnotifications-languages-to-notify-label' => 'Which languages to notify:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Comma-separated language codes; leave blank to notify for all languages.',
	'translationnotifications-priority' => 'Priority:',
	'translationnotifications-priority-high' => 'high',
	'translationnotifications-priority-medium' => 'medium',
	'translationnotifications-priority-low' => 'low',
	'translationnotifications-priority-unset' => '(unset)',
	'translationnotifications-translatablepage-title' => 'Translatable page name:',
	'translationnotifications-error-no-translatable-pages' => 'There are no translatable pages in this wiki.',
	'translationnotifications-email-subject' => 'Please translate the page $1',
	'translationnotifications-email-body' => 'Hello $1,

You are receiving this email because you {{GENDER:$10|signed up}} as a translator {{PLURAL:$9|to}} $2 on {{SITENAME}}.

There is a page to translate there: $3.
You can translate it by clicking the following link:
$4

$5
$6

$7

Your help is greatly appreciated. Translators like you help {{SITENAME}} to function
as a truly multilingual community.

Thank you!
{{SITENAME}} translation coordinators

----

You are receiving this email because you signed up to receive emails related to translations on {{SITENAME}}. To unsubscribe or to change your notification preferences for translations, please visit $8.',
	'translationnotifications-talkpage-body' => 'Hello $2,

You are receiving this notification because you {{GENDER:$1|signed up}} as a translator {{PLURAL:$9|to}} $3 on {{SITENAME}}.
The page [[$4]] is available for translation. You can translate it here:
$5

$6
$7

$8

Your help is greatly appreciated. Translators like you help {{SITENAME}} to function
as a truly multilingual community.

Thank you!

{{SITENAME}} translation coordinators',
	'translationnotifications-notification-url-listitem' => 'translate to $1',
	'translationnotifications-digestemail-subject' => 'Digest email for translation requests from {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hello $1,

You are receiving this email because you {{GENDER:$1|signed up}} as a translator to $2 on {{SITENAME}}.

There {{PLURAL:$3|is 1 page|are $3 pages}} available for translation. The details are given below.

$4

Your help is greatly appreciated. Translators like you help {{SITENAME}} to function
as a truly multilingual community.

Thank you!
{{SITENAME}} translation administrators

----

You are receiving this email because you signed up to receive emails related to translations on {{SITENAME}}. To unsubscribe or to change your notification preferences for translations, please visit <$5>.',
	'translationnotifications-digestemail-notification-line' => 'On $1, $2 marked "$3" for translation. You can translate it at $4',
	'translationnotifications-edit-summary' => 'Translation notification: $1',
	'translationnotifications-email-priority' => 'The priority of this page is $1.',
	'translationnotifications-email-deadline' => 'The deadline for translating this page is $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|sent}} a notification about translating page $3; {{PLURAL:$10|language|languages}}: $4; deadline: $5; priority: $6; sent to {{PLURAL:$7|one recipient|$7 recipients}}, failed for {{PLURAL:$8|one recipient|$8 recipients}}, skipped for {{PLURAL:$9|one recipient|$9 recipients}}',
	'log-name-notifytranslators' => 'Translation notifications',
	'log-description-notifytranslators' => 'A log of notifications sent to translators about translatable pages',
	'translationnotifications-sent-title' => 'Translation notification sent',
	'translationnotifications-sent-body' => 'Translation notification was sent.',
	'translationnotifications-log-alllanguages' => 'all languages',
	'translationnotifications-nodeadline' => 'none',
	'translationnotifications-signup-legal' => 'You agree that by providing this information we may contact you regarding topics related to {{SITENAME}} we think may be of interest to you. You agree your data is subject to our  [[{{MediaWiki:Privacypage}}|privacy policy]].'
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Cquoi
 * @author Kghbln
 * @author Nemo bis
 * @author Olli
 * @author Raymond
 * @author SPQRobin
 * @author Shirayuki
 * @author Siebrand
 */
$messages['qqq'] = array(
	'translatorsignup' => 'Special page header',
	'translatorsignup-summary' => 'Text on top of Special:TranslatorSignup.',
	'translationnotifications-desc' => '{{desc|name=Translation Notifications|url=http://www.mediawiki.org/wiki/Extension:TranslationNotifications}}',
	'translationnotifications-info' => 'Fieldset header',
	'translationnotifications-username' => 'Label followed by username.
{{Identical|Username}}',
	'translationnotifications-emailstatus' => 'Label',
	'translationnotifications-email-confirmed' => 'Status of email confirmation after {{msg-mw|translationnotifications-emailstatus}}.',
	'translationnotifications-email-disablemail' => 'A message that appears on top of Special:TranslatorSignup if the email address is confirmed, the user disabled email in the preferences.',
	'translationnotifications-email-unconfirmed' => 'Status of email confirmation after {{msg-mw|translationnotifications-emailstatus}}. Parameters:
* $1 is a button which can be used to send confirmation email. Button text is {{msg-mw|confirmemail_send}}.',
	'translationnotifications-email-notset' => 'Status of email confirmation after {{msg-mw|translationnotifications-emailstatus}}.',
	'translationnotifications-languages' => 'Fieldset header',
	'translationnotifications-lang' => 'Label for select, $1 is a number',
	'translationnotifications-nolang' => 'First option in a language select',
	'translationnotifications-contact' => 'Fieldset header',
	'translationnotifications-cmethod-email' => 'Check option label',
	'translationnotifications-cmethod-talkpage' => 'Check option label',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Check option label',
	'translationnotifications-cmethod-feed' => 'Check option label',
	'translationnotifications-frequency' => 'Fieldset header',
	'translationnotifications-freq-always' => 'Radio option label',
	'translationnotifications-freq-week' => 'Radio option label',
	'translationnotifications-freq-month' => 'Radio option label',
	'translationnotifications-freq-weekly' => 'Radio option label',
	'translationnotifications-freq-monthly' => 'Radio option label',
	'translationnotifications-submit' => 'Submit button text',
	'translationnotifications-signup-success' => 'A message that appears on the top of Special:TranslatorSignup after saving the preferences.',
	'notifytranslators' => 'The title of the Special:NotifyTranslators special page.',
	'translationnotifications-send-notification-button' => 'A title for the submit button of the translator notification form.',
	'translationnotifications-deadline-label' => 'A label for the deadline field, which will have a datepicker.',
	'translationnotifications-languages-to-notify-label' => 'A label for language codes field.',
	'translationnotifications-priority' => 'A label for translation priority field.
{{Identical|Priority}}',
	'translationnotifications-priority-high' => 'high (priority), an item in a dropdown box.
{{Identical|High}}',
	'translationnotifications-priority-medium' => 'medium (priority), an item in a dropdown box.',
	'translationnotifications-priority-low' => 'low (priority), an item in a dropdown box.',
	'translationnotifications-priority-unset' => 'unset (priority), an item in a dropdown box.',
	'translationnotifications-translatablepage-title' => 'A label for language codes field. Can be translated as "A page designated for translation, intended for translation", etc.',
	'translationnotifications-error-no-translatable-pages' => 'An error message.',
	'translationnotifications-email-subject' => 'A subject for the email sent to translators.',
	'translationnotifications-email-body' => "The body of the email message sent to translators.

* $1 - Translator's username or real name, if specified.
* $2 - A comma list of language names.
* $3 - Translatable page name.
* $4 - A bullet list of URLs.
* $5 - The message {{msg-mw|translationnotifications-email-priority}}. Empty if no priority was specified.
* $6 - The message {{msg-mw|translationnotifications-email-deadline}}. Empty if no deadline was specified.
* $7 - A custom message that can be added by the notification sender.
* $8 - URL to the special page, to unsubscribe.
* $9 - Number of languages. Can be used in PLURAL.
* $10- Plain text username used for GENDER.",
	'translationnotifications-talkpage-body' => "The body of the notification on user talk page.

* $2 - Translator's username or real name, if specified.
* $3 - A comma list of language names.
* $4 - Translatable page name.
* $5 - A bulleted list of URLs to translation pages.
* $6 - The message {{msg-mw|translationnotifications-email-priority}}. Empty if no priority was specified.
* $7 - The message {{msg-mw|translationnotifications-email-deadline}}. Empty if no deadline was specified.
* $8 - A custom message that can be added by the notification sender.
* $9 - Number of languages. Can be used in PLURAL.",
	'translationnotifications-notification-url-listitem' => 'This is an item in a bullted list of hyperlinks to translation pages. $1 is a language name.',
	'translationnotifications-digestemail-body' => '
* $1 - username
* $2 - first language preference of user
* $3 - number of pages available for translation.
* $4 - The list of notifications, this is the main part of the email.
* <$5> - Link to [[Special:NotifyTranslators]]',
	'translationnotifications-digestemail-notification-line' => 'The message line for notification in the digest.
* $1 - date
* $2 - user name
* $3 - translatable page title
* $4 - link to [[Special:Translate]] page for the users first language.',
	'translationnotifications-edit-summary' => 'The edit summary for the notification text added to the user talk page. $1 is the page title.',
	'translationnotifications-email-priority' => 'Used in {{msg-mw|translationnotifications-email-body}}',
	'translationnotifications-email-deadline' => '$1 is a date.

Used in {{msg-mw|translationnotifications-email-body}}',
	'logentry-translationnotifications-sent' => '{{logentry}}
* $4 - list of language codes, or {{msg-mw|translationnotifications-log-alllanguages}}
* $5 - deadline
* $6 - priority
* $7 - number of recipients to whom the notification was sent successfully
* $8 - number of recipients to whom sending the notification failed
* $9 - number of recipients to whom the notification was not sent because it was too early to send it according to their preferences.
* $10 - number of notified languages; 999 in case of {{msg-mw|translationnotifications-log-alllanguages}}.',
	'log-name-notifytranslators' => 'Log page title.',
	'log-description-notifytranslators' => 'Log page description',
	'translationnotifications-sent-title' => 'The title of the page shown after the notification is sent.
Similar to {{msg-mw|emailsent}}.',
	'translationnotifications-log-alllanguages' => 'Appears in the log message, saying that the notification was sent to translators to all languages.',
	'translationnotifications-nodeadline' => 'Appears in the log message, saying that no deadline was specified. Traduction en français : "aucune" (date limite).
{{Identical|None}}',
	'translationnotifications-signup-legal' => 'Legal text shown at the bottom of [[Special:TranslatorSignup]] page.',
);

/** Assamese (অসমীয়া)
 * @author Bishnu Saikia
 */
$messages['as'] = array(
	'translatorsignup' => 'অনুবাদক ৰূপে পঞ্জীয়ন',
	'translationnotifications-info' => 'সদস্যৰ তথ্য',
	'translationnotifications-username' => 'সদস্য নাম:',
	'translationnotifications-emailstatus' => 'ই-মেইলৰ স্থিতি:',
	'translationnotifications-email-confirmed' => 'আপোনাৰ ইমেইল ঠিকনা নিশ্চিত হ’ল',
	'translationnotifications-email-unconfirmed' => '$1, আপোনাৰ ইমেইল ঠিকনা নিশ্চিত কৰা হোৱা নাই।',
	'translationnotifications-languages' => 'ভাষাসমূহ',
	'translationnotifications-lang' => 'ভাষা #$1',
	'translationnotifications-nolang' => 'ভাষা নির্বাচন কৰক',
	'translationnotifications-contact' => 'যোগাযোগ প্ৰক্ৰিয়াৰ বাবে নিৰ্বাচিত পছন্দসমূহ',
	'translationnotifications-cmethod-email' => 'ই-মেইল',
	'translationnotifications-cmethod-talkpage' => 'আলোচনা পৃষ্ঠা',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'অন্য ৱিকিৰ আলোচনা পৃষ্ঠা',
	'translationnotifications-cmethod-feed' => 'ভুক্তি',
	'translationnotifications-frequency' => 'সদায়েই যোগাযোগ ৰাখক',
	'translationnotifications-freq-always' => 'যেতিয়াই নতুন কিবা ভাঙনিৰ কাম থাকে',
	'translationnotifications-freq-week' => 'সপ্তাহত কমেও এবাৰকৈ',
	'translationnotifications-freq-month' => 'মাহত কমেও এবাৰকৈ',
	'translationnotifications-freq-weekly' => 'সাপ্তাহিক ভূক্তি',
	'translationnotifications-freq-monthly' => 'মাহিলী ভূক্তি',
	'translationnotifications-submit' => 'পছন্দসমূহ সাঁচি ৰাখক',
	'translationnotifications-signup-success' => 'আপোনাৰ ভাঙনিৰ জাননীসমূহৰ পছন্দ সাঁচি ৰখা হৈছে',
	'notifytranslators' => 'ভাঙনিকৰ্তাক জনাওক',
	'translationnotifications-send-notification-button' => 'ভাঙনিকৰ্তালৈ জাননী প্ৰেৰণ কৰক',
	'translationnotifications-priority' => 'প্ৰাথমিকতা',
	'translationnotifications-priority-high' => 'উচ্চ',
	'translationnotifications-priority-medium' => 'মধ্যম',
	'translationnotifications-priority-low' => 'নিম্ন',
	'translationnotifications-notification-url-listitem' => '$1’লৈ ভাঙনি',
	'translationnotifications-edit-summary' => 'ভাঙনিৰ জাননী: $1',
	'translationnotifications-log-alllanguages' => 'সকলোবোৰ ভাষা',
	'translationnotifications-nodeadline' => 'একো নাই',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'translatorsignup' => 'Падпіскі перакладчыка',
	'translatorsignup-summary' => 'На гэтай старонцы вы можаце пазначыць, на якія мовы перакладаеце і як з вамі скантактавацца на конт новых запытаў на пераклад.',
	'translationnotifications-desc' => 'Дазваляе перакладчыкам падпісвацца на паведамленьні пра пераклады',
	'translationnotifications-info' => 'Зьвесткі карыстальніка',
	'translationnotifications-username' => 'Імя ўдзельніка:',
	'translationnotifications-emailstatus' => 'Стан e-mail:',
	'translationnotifications-email-confirmed' => 'Ваш адрас e-mail пацьверджаны',
	'translationnotifications-email-disablemail' => 'Ваш e-mail адрас пацьверджаны, але ў [[Special:Preferences|наладах]] вы пажадалі не атрымліваць лістоў.',
	'translationnotifications-email-unconfirmed' => 'Ваш адрас e-mail не пацьверджаны. $1',
	'translationnotifications-email-notset' => 'Вы не паведамілі адрас e-mail. Вы можаце зрабіць гэта ў вашых [[Special:Preferences|наладах]].',
	'translationnotifications-languages' => 'Мовы',
	'translationnotifications-lang' => 'Мова №$1',
	'translationnotifications-nolang' => 'Выберыце мову',
	'translationnotifications-contact' => 'Пажаданыя спосабы паведамленьня',
	'translationnotifications-cmethod-email' => 'Электронная пошта',
	'translationnotifications-cmethod-talkpage' => 'Старонка гутарак',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Старонка гутарак у іншай вікі',
	'translationnotifications-cmethod-feed' => 'Стужка',
	'translationnotifications-frequency' => 'Частасьць паведамленьняў',
	'translationnotifications-freq-always' => 'Калі зьяўляецца, што перакладаць',
	'translationnotifications-freq-week' => 'Ня болей разу на тыдзень',
	'translationnotifications-freq-month' => 'Ня болей разу на месяц',
	'translationnotifications-freq-weekly' => 'Тыднёвы дайджэст',
	'translationnotifications-freq-monthly' => 'Месячны дайджэст',
	'translationnotifications-submit' => 'Абнавіць налады',
	'translationnotifications-signup-success' => 'Вашыя налады паведамленьняў пра пераклады захаваныя.',
	'notifytranslators' => 'Паведаміць перакладчыкам',
	'translationnotifications-submit-ok' => 'Паведамленьни были даданыя ў чаргу на адпраўку ў фонавым рэжыме.',
	'translationnotifications-send-notification-button' => 'Даслаць паведамленьне перакладчыкам',
	'translationnotifications-deadline-label' => 'Тэрмін здачы для адлюстраваньня ў апавяшчэньні:',
	'translationnotifications-languages-to-notify-label' => 'Мовы для апавяшчэньня:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Сьпіс кодаў моваў праз коску; пакіньце поле пустым, каб даслаць на ўсе мовы.',
	'translationnotifications-priority' => 'Прыярытэт:',
	'translationnotifications-priority-high' => 'высокі',
	'translationnotifications-priority-medium' => 'сярэдні',
	'translationnotifications-priority-low' => 'нізкі',
	'translationnotifications-priority-unset' => '(не зададзена)',
	'translationnotifications-translatablepage-title' => 'Перакладальная назва старонкі:',
	'translationnotifications-error-no-translatable-pages' => 'У гэтай вікі няма старонак для перакладу.',
	'translationnotifications-email-subject' => 'Калі ласка, перакладзіце старонку $1',
	'translationnotifications-email-body' => 'Вітаем, $1.

Вы атрымалі гэты ліст, бо заявілі сябе перакладчыкам на $2 у {{GRAMMAR:месны|{{SITENAME}}}}.

Для перакладу даступная старонка: $3.
Вы можаце перакласьці яе, перайшоўшы па спасылцы:
$4

$5
$6

$7

Мы вельмі ўдзячныя за вашу дапамогу. Перакладчыкі дапамагаюць {{GRAMMAR:давальны|{{SITENAME}}}} падтрымліваць статус сапраўды шматмоўнай супольнасьці.

Вялікі дзякуй!
Каардынатары перакладаў {{GRAMMAR:родны|{{SITENAME}}}}

----

Вы атрымалі гэты ліст, бо дазволілі атрыманьне электронных лістоў, датычных перакладаў у {{GRAMMAR:месны|{{SITENAME}}}}. Каб адпісацца ад апавяшчэньняў ці зьмяніць налады апавяшчэньня, наведайце $8, калі ласка.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Вітаем, $2!

Вы атрымалі гэтае апавяшчэньне, бо заявілі сябе перакладчыкам на мовы $3 у {{GRAMMAR:месны|{{SITENAME}}}}.
Старонка [[$4]] цяпер даступная для перакладу. Вы можаце перакласьці яе тут:
$5

$6
$7

$8

Мы вельмі ўдзячныя за вашу дапамогу. Перакладчыкі дапамагаюць {{GRAMMAR:давальны|{{SITENAME}}}} падтрымліваць статус сапраўды шматмоўнай супольнасьці.

Вялікі дзякуй!

Каардынатары перакладаў {{GRAMMAR:родны|{{SITENAME}}}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'перакласьці на $1',
	'translationnotifications-edit-summary' => 'Апавяшчэньне пра пераклад: $1',
	'translationnotifications-email-priority' => 'Прыярытэт гэтай старонкі — $1.',
	'translationnotifications-email-deadline' => 'Апошні тэрмін для перакладу гэтай старонкі — $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|апавясьціў|апавясьціла}} пра пераклад старонкі «$3»; мовы: $4; тэрмін: $5; прыярытэт: $6; даслана {{PLURAL:$7|аднаму адрасату|$7 адрасатам}}, няўдала даслана {{PLURAL:$8|аднаму адрасату|$8 адрасатам}}, не даслана {{PLURAL:$9|аднаму адрасату|$9 адрасатам}}', # Fuzzy
	'log-name-notifytranslators' => 'Апавяшчэньні пра пераклад',
	'translationnotifications-sent-title' => 'Апавяшчэньне пра пераклад высланае',
	'translationnotifications-log-alllanguages' => 'усе мовы',
	'translationnotifications-nodeadline' => 'няма',
);

/** Bulgarian (български)
 * @author පසිඳු කාවින්ද
 */
$messages['bg'] = array(
	'translationnotifications-username' => 'Потребителско име:',
	'translationnotifications-languages' => 'Езици',
	'translationnotifications-cmethod-email' => 'Е-поща',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Nasir8891
 */
$messages['bn'] = array(
	'translationnotifications-info' => 'ব্যবহারকারীর তথ্য',
	'translationnotifications-username' => 'ব্যবহারকারী নাম:',
	'translationnotifications-emailstatus' => 'ইমেইলের অবস্থা:',
	'translationnotifications-email-confirmed' => 'আপনার ইমেইল ঠিকানা নিশ্চিত করা হয়েছে',
	'translationnotifications-email-unconfirmed' => 'আপনার ইমেইল ঠিকানা নিশ্চিত করা হয়নি। $1',
	'translationnotifications-languages' => 'ভাষা',
	'translationnotifications-cmethod-email' => 'ই-মেইল',
	'translationnotifications-cmethod-talkpage' => 'আলাপ পাতা',
	'translationnotifications-cmethod-feed' => 'ফিড',
	'translationnotifications-priority' => 'গুরুত্ব:',
	'translationnotifications-priority-high' => 'উচ্চ',
	'translationnotifications-priority-medium' => 'মধ্যম',
	'translationnotifications-priority-low' => 'নিম্ন',
	'translationnotifications-log-alllanguages' => 'সকল ভাষা',
	'translationnotifications-nodeadline' => 'কিছু না',
);

/** Breton (brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'translatorsignup' => 'Kevreadur an troer',
	'translationnotifications-info' => 'Titouroù diwar-benn un implijer',
	'translationnotifications-username' => 'Anv implijer :',
	'translationnotifications-emailstatus' => 'Stad ar postel :',
	'translationnotifications-email-confirmed' => "Kadarnaet eo bet ho chomlec'h postel",
	'translationnotifications-email-unconfirmed' => "N'eo ket bet kadarnaet ho chomlec'h postel. $1",
	'translationnotifications-languages' => 'Yezhoù',
	'translationnotifications-lang' => 'Yezh #$1',
	'translationnotifications-nolang' => 'Dibabit ur yezh',
	'translationnotifications-cmethod-email' => 'Postel',
	'translationnotifications-cmethod-talkpage' => 'Pajenn gaozeal',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pajenn gaozeal war wikioù all',
	'translationnotifications-cmethod-feed' => 'Lanvad',
	'translationnotifications-freq-week' => "Ur wezh ar sizhun d'ar muiañ",
	'translationnotifications-freq-month' => "Ur wezh ar miz d'ar muiañ",
	'translationnotifications-freq-weekly' => 'Diverrañ ar sizhun',
	'translationnotifications-freq-monthly' => 'Diverrañ ar miz',
	'translationnotifications-submit' => "Hizivaat ar c'hefluniadur",
	'notifytranslators' => 'Kelaouiñ an droerien',
	'translationnotifications-send-notification-button' => "Kas ur c'hemenn d'an droourien",
	'translationnotifications-priority' => 'Priorelezh :',
	'translationnotifications-priority-high' => 'uhel',
	'translationnotifications-priority-medium' => 'etre',
	'translationnotifications-priority-low' => 'izel',
	'translationnotifications-priority-unset' => "(n'eo ket resisaet)",
	'translationnotifications-translatablepage-title' => 'Anv ar bajenn da vezañ troet :',
	'translationnotifications-error-no-translatable-pages' => "N'eus pajenn ebet da dreiñ er wiki-mañ.",
	'translationnotifications-email-subject' => "Troit ar bajenn $1, mar plij ganeoc'h",
	'translationnotifications-notification-url-listitem' => 'treiñ e $1',
	'translationnotifications-email-priority' => '$1 eo live priorelezh ar bajenn-mañ.',
	'log-name-notifytranslators' => 'Kemennoù treiñ',
	'translationnotifications-log-alllanguages' => 'an holl yezhoù',
	'translationnotifications-nodeadline' => 'hini ebet',
);

/** Sorani Kurdish (کوردی)
 * @author Calak
 */
$messages['ckb'] = array(
	'translationnotifications-cmethod-email' => 'ئیمەیل',
);

/** Czech (česky)
 * @author Chmee2
 * @author Vks
 */
$messages['cs'] = array(
	'translationnotifications-info' => 'Informace o uživateli',
	'translationnotifications-username' => 'Uživatelské jméno:',
	'translationnotifications-emailstatus' => 'Stav e-mailu:',
	'translationnotifications-languages' => 'Jazyky',
	'translationnotifications-nolang' => 'Zvolte jazyk',
	'translationnotifications-contact' => 'Preferované způsoby kontaktu',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Diskusní stránka',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskuzní stránka na jiných wiki',
	'translationnotifications-cmethod-feed' => 'Kanály:',
	'translationnotifications-frequency' => 'Četnost kontaktu',
	'translationnotifications-freq-always' => 'Když je něco nového k překladu',
	'translationnotifications-freq-week' => 'Maximálně jednou za týden',
	'translationnotifications-freq-month' => 'Maximálně jednou za měsíc',
	'translationnotifications-freq-weekly' => 'Týdenní výtah',
	'translationnotifications-freq-monthly' => 'Měsíční výtah',
	'translationnotifications-submit' => 'Aktualizovat nastavení',
	'translationnotifications-signup-success' => 'Vaše preference oznámení o překladech byly uloženy.',
	'notifytranslators' => 'Oznámit překladatelům',
	'translationnotifications-submit-ok' => 'Oznámení byla přidána do fronty a jsou doručovány na pozadí práce.',
	'translationnotifications-send-notification-button' => 'Odeslat oznámení pro překladatele',
	'translationnotifications-languages-to-notify-label' => 'Jaký jazyk oznámení?',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'vysoká',
	'translationnotifications-priority-medium' => 'střední',
	'translationnotifications-priority-low' => 'nízká',
	'translationnotifications-priority-unset' => '(nedefinováno)',
	'translationnotifications-translatablepage-title' => 'Název stránky k překladu',
	'translationnotifications-error-no-translatable-pages' => 'Na této wiki nejsou žádné nepřeložené stránky.',
	'translationnotifications-email-subject' => 'Prosím přeložit stránku $1',
	'translationnotifications-log-alllanguages' => 'všechny jazyky',
	'translationnotifications-nodeadline' => 'žádný',
);

/** German (Deutsch)
 * @author Geitost
 * @author Kghbln
 * @author MF-Warburg
 * @author Metalhead64
 */
$messages['de'] = array(
	'translatorsignup' => 'Übersetzerregistrierung',
	'translatorsignup-summary' => 'Nutze diese Seite, um anzugeben, in welche Sprachen du übersetzen kannst und wie du bei Übersetzungsanfragen benachrichtigt werden möchtest.',
	'translationnotifications-desc' => 'Ermöglicht es Übersetzern Übersetzungsbenachrichtigungen zu abonnieren',
	'translationnotifications-info' => 'Benutzerinformation',
	'translationnotifications-username' => 'Benutzername:',
	'translationnotifications-emailstatus' => 'E-Mail-Status:',
	'translationnotifications-email-confirmed' => 'Deine E-Mail-Adresse ist bestätigt',
	'translationnotifications-email-disablemail' => 'Deine E-Mail-Adresse ist bestätigt, du bittest allerdings über [[Special:Preferences|deine Einstellungen]] darum, keine E-Mails zugesandt zu bekommen.',
	'translationnotifications-email-unconfirmed' => 'Deine E-Mail-Adresse ist nicht bestätigt. $1',
	'translationnotifications-email-notset' => 'Du hast keine E-Mail-Adresse angegeben. Dies kannst du in deinen [[Special:Preferences|Einstellungen]] tun.',
	'translationnotifications-languages' => 'Sprachen',
	'translationnotifications-lang' => 'Sprache Nr. $1',
	'translationnotifications-nolang' => 'Wähle eine Sprache',
	'translationnotifications-contact' => 'Bevorzugte Benachrichtigungsmethode(n)',
	'translationnotifications-cmethod-email' => 'E-Mail',
	'translationnotifications-cmethod-talkpage' => 'Diskussionsseite',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskussionsseite auf einem anderen Wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Benachrichtigungshäufigkeit',
	'translationnotifications-freq-always' => 'Immer dann, wenn neue Übersetzungen vorhanden sind',
	'translationnotifications-freq-week' => 'Höchstens einmal pro Woche',
	'translationnotifications-freq-month' => 'Höchstens einmal pro Monat',
	'translationnotifications-freq-weekly' => 'Wöchentlicher Bericht',
	'translationnotifications-freq-monthly' => 'Monatlicher Bericht',
	'translationnotifications-submit' => 'Einstellungen aktualisieren',
	'translationnotifications-signup-success' => 'Die Einstellungen zu den Übersetzungsbenachrichtigungen wurden gespeichert.',
	'notifytranslators' => 'Übersetzer benachrichtigen',
	'translationnotifications-submit-ok' => 'Die Übersetzungsbenachrichtigungen wurden zu einer Auftragswarteschlange hinzugefügt und werden von einem Hintergrundauftrag versandt.',
	'translationnotifications-send-notification-button' => 'Benachrichtigung an die Übersetzer senden',
	'translationnotifications-deadline-label' => 'In der Benachrichtigung anzugebenden Frist:',
	'translationnotifications-languages-to-notify-label' => 'Benachrichtigungen zu folgenden Sprachen:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kommagetrennte Sprachcodes; für Benachrichtigungen zu allen Sprachen frei lassen.',
	'translationnotifications-priority' => 'Priorität:',
	'translationnotifications-priority-high' => 'hoch',
	'translationnotifications-priority-medium' => 'mittel',
	'translationnotifications-priority-low' => 'niedrig',
	'translationnotifications-priority-unset' => '(nicht gesetzt)',
	'translationnotifications-translatablepage-title' => 'Name der zu übersetzenden Seite:',
	'translationnotifications-error-no-translatable-pages' => 'Es gibt in diesem Wiki keine zu übersetzenden Seiten.',
	'translationnotifications-email-subject' => 'Bitte übersetze die Seite $1.',
	'translationnotifications-email-body' => 'Hallo $1,

du erhältst diese E-Mail, da du dich als Übersetzer(in) für die {{PLURAL:$9|Sprache|Sprachen}} $2 auf {{SITENAME}} {{GENDER:$10|registriert}} hast.

Die zu übersetzende Seite: $3.
Sie kann nach einem Klick auf den folgenden Link übersetzt werden:
$4

$5
$6

$7

Deine Hilfe wird sehr geschätzt. Übersetzer wie du helfen dabei, dass {{SITENAME}} als wirklich mehrsprachige Gemeinschaft fungiert.

Vielen Dank,
die Übersetzungskoordinatoren von {{SITENAME}}

----

Du erhältst diese E-Mail, da du dich zum Empfang von E-Mails für Übersetzungen auf {{SITENAME}} registriert hast. Zum Abmelden oder Ändern deiner Benachrichtigungseinstellungen für Übersetzungen besuche bitte $8.',
	'translationnotifications-talkpage-body' => 'Hallo $2,

du erhältst diese E-Mail, da du dich als Übersetzer(in) {{PLURAL:$9|für}} $3 auf {{SITENAME}} {{GENDER:$1|registriert}} hast.
Die Seite [[$4]] ist zum Übersetzen vorhanden. Du kannst sie hier übersetzen:
$5

$6
$7

$8

Deine Hilfe wird sehr geschätzt. Übersetzer wie du helfen dabei, dass {{SITENAME}}
als wirklich mehrsprachige Gemeinschaft fungiert.

Vielen Dank,
die Übersetzungskoordinatoren von {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'übersetzen in $1',
	'translationnotifications-digestemail-subject' => 'E-Mail-Übersicht zu Übersetzungsanforderungen von {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hallo $1,

du erhältst diese E-Mail, da du dich als Übersetzer(in) für $2 auf {{SITENAME}} {{GENDER:$1|registriert}} hast.
Es {{PLURAL:$3|ist eine Seite|sind $3 Seiten}} zum Übersetzen vorhanden. Einzelheiten sind unten angegeben:

$4

Deine Hilfe wird sehr geschätzt. Übersetzer wie du helfen dabei, dass {{SITENAME}}
als wirklich mehrsprachige Gemeinschaft fungiert.

Vielen Dank,
die Übersetzungsadministratoren von {{SITENAME}}

----

Du erhältst diese E-Mail, da du dich zum Empfang von E-Mails bezüglich der Übersetzungen auf {{SITENAME}} registriert hast. Zum Abmelden oder Ändern deiner Benachrichtigungseinstellungen für Übersetzungen, besuche bitte <$5>.',
	'translationnotifications-digestemail-notification-line' => 'Am $1 gab $2 die Seite „$3“ zur Übersetzung frei. Du kannst sie unter $4 übersetzen.',
	'translationnotifications-edit-summary' => 'Übersetzungsbenachrichtigung: $1',
	'translationnotifications-email-priority' => 'Übersetzungspriorität dieser Seite: $1.',
	'translationnotifications-email-deadline' => 'Frist zur Übersetzung der Seite: $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|sandte}} eine Benachrichtigung bezüglich der Übersetzung der Seite $3 in die {{PLURAL:$10|Sprache|Sprachen}} $4, mit der Frist $5 und der Priorität $6, erfolgreich an {{PLURAL:$7|einen Empfänger|$7 Empfänger}} und erfolglos an {{PLURAL:$8|einen Empfänger|$8 Empfänger}}, wobei {{PLURAL:$9|ein Empfänger nicht angeschrieben wurde|$9 Empfänger nicht angeschrieben wurden}}.',
	'log-name-notifytranslators' => 'Übersetzungsbenachrichtigungs-Logbuch',
	'log-description-notifytranslators' => 'Das Logbuch der Benachrichtigungen, die bezüglich übersetzbarer Seiten an die Übersetzer gesandt wurden.',
	'translationnotifications-sent-title' => 'Übersetzungsbenachrichtigung verschickt',
	'translationnotifications-sent-body' => 'Die Übersetzungsbenachrichtigung wurde verschickt.',
	'translationnotifications-log-alllanguages' => 'alle Sprachen',
	'translationnotifications-nodeadline' => 'keine',
	'translationnotifications-signup-legal' => 'Mit Angabe dieser Informationen stimmst du zu, dass wir dich bezüglich Themen im Zusammenhang mit {{SITENAME}} kontaktieren können, die unserer Meinung nach für dich von Interesse sind. Du stimmst zudem zu, dass deine Daten unseren [[{{MediaWiki:Privacypage}}|Datenschutzgrundsätzen]] unterliegen.',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Geitost
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'translatorsignup-summary' => 'Nutzen Sie diese Seite, um anzugeben, in welche Sprachen Sie übersetzen können und wie Sie bei Übersetzungsanfragen benachrichtigt werden möchten.',
	'translationnotifications-email-confirmed' => 'Ihre E-Mail-Adresse ist bestätigt',
	'translationnotifications-email-disablemail' => 'Ihre E-Mail-Adresse ist bestätigt, bitten allerdings über [[Special:Preferences|Ihren Einstellungen]] darum, keine E-Mails zugesandt zu bekommen.',
	'translationnotifications-email-unconfirmed' => 'Ihre E-Mail-Adresse ist nicht bestätigt. $1',
	'translationnotifications-email-notset' => 'Sie haben keine E-Mail-Adresse angegeben. Dies können Sie in Ihren [[Special:Preferences|Einstellungen]] tun.',
	'translationnotifications-nolang' => 'Wählen Sie eine Sprache',
	'translationnotifications-email-subject' => 'Bitte übersetzen Sie die Seite $1.',
	'translationnotifications-email-body' => 'Hallo $1,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für die {{PLURAL:$9|Sprache|Sprachen}} $2 auf {{SITENAME}} registriert haben.

Die zu übersetzende Seite: $3.
Sie kann nach einem Klick auf den folgenden Link übersetzt werden:
$4

$5
$6

$7

Ihre Hilfe wird sehr geschätzt. Übersetzer wie Sie helfen dabei, dass {{SITENAME}} als wirklich mehrsprachige Gemeinschaft fungiert.

Vielen Dank,
die Übersetzungskoordinatoren von {{SITENAME}}

----

Sie erhalten diese E-Mail, da Sie sich zum Empfang von E-Mails für Übersetzungen auf {{SITENAME}} registriert haben. Zum Abmelden oder Ändern Ihrer Benachrichtigungseinstellungen für Übersetzungen besuchen Sie bitte $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Hallo $2,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für $3 auf {{SITENAME}} registriert haben.
Eine Seite [[$4]] ist zum Übersetzen vorhanden. Sie können sie hier übersetzen:
$5

$6
$7

$8

Vielen Dank,
die Übersetzungskoordinatoren von {{SITENAME}}', # Fuzzy
	'translationnotifications-digestemail-body' => 'Hallo $1,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für $2 auf {{SITENAME}} registriert haben.
Es {{PLURAL:$3|ist eine Seite|sind $3 Seiten}} zum Übersetzen vorhanden. Einzelheiten sind unten angegeben:

$4

Um Ihre Einstellungen zu Übersetzungsbenachrichtigungen zu ändern, können Sie <$5> besuchen.

Vielen Dank,
die Übersetzungsadministratoren von {{SITENAME}}

----

Sie erhalten diese E-Mail, da Sie sich zum Empfang von E-Mails bezüglich der Übersetzungen auf {{SITENAME}} registriert haben. Zum Abmelden oder Ändern Ihrer Benachrichtigungseinstellungen für Übersetzungen, besuchen Sie bitte <$5>.', # Fuzzy
	'translationnotifications-signup-legal' => 'Mit Angabe dieser Informationen stimmen Sie zu, dass wir Sie bezüglich Themen im Zusammenhang mit {{SITENAME}} kontaktieren können, die unserer Meinung nach für Sie von Interesse sind. Sie stimmen zudem zu, dass Ihre Daten unseren [[{{MediaWiki:Privacypage}}|Datenschutzgrundsätzen]] unterliegen.',
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 */
$messages['diq'] = array(
	'translationnotifications-info' => 'Zanışiya Karberi',
	'translationnotifications-username' => 'Namey karberi:',
	'translationnotifications-emailstatus' => 'Weziyetê e-posta:',
	'translationnotifications-languages' => 'Zıwani',
	'translationnotifications-lang' => 'Zıwan: $1',
	'translationnotifications-nolang' => 'Yew zıwan weçinê',
	'translationnotifications-contact' => 'Metodê irtibat dê timarkerdışi',
	'translationnotifications-cmethod-email' => 'E-posta',
	'translationnotifications-cmethod-talkpage' => 'Pela werênayışi',
	'translationnotifications-cmethod-feed' => 'Warikerdış',
	'translationnotifications-priority' => 'Wahdeyey:',
	'translationnotifications-priority-high' => 'berz',
	'translationnotifications-priority-medium' => 'werte',
	'translationnotifications-priority-low' => 'kılm',
	'translationnotifications-log-alllanguages' => 'zıwani pêro',
	'translationnotifications-nodeadline' => 'çıniyo',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translatorsignup' => 'Registrěrowanje pśełožowarja',
	'translatorsignup-summary' => 'Wužyj toś ten bok, aby podał, do kótarychž rěcow móžoš pśełožyś a kak coš se wó nowych póžědanych pśełožkach informěrowaś.',
	'translationnotifications-desc' => 'Zmóžnja registrěrowanje pśełožowarjow za pśełožowańske powěźeńki',
	'translationnotifications-info' => 'Wužywarske informacije',
	'translationnotifications-username' => 'Wužywarske mě:',
	'translationnotifications-emailstatus' => 'E-mailowy status',
	'translationnotifications-email-confirmed' => 'Twója e-mailowa adresa jo wobkšuśona',
	'translationnotifications-email-disablemail' => 'Twója e-mailowa adresa jo so wobkšuśiła, ale pśez [[Special:Preferences|twóje nastajenja]] sy póstajił, až njocoš žednu e-mail dostaś.',
	'translationnotifications-email-unconfirmed' => 'Twója e-mailowa adresa njejo wobkšuśona. $1',
	'translationnotifications-email-notset' => 'Njejsy e-mailowu adresu pódał. Móžoš to w swójich [[Special:Preferences|nastajenjach]] cyniś.',
	'translationnotifications-languages' => 'Rěcy',
	'translationnotifications-lang' => 'Rěc nr. $1',
	'translationnotifications-nolang' => 'Rěc wubraś',
	'translationnotifications-contact' => 'Preferěrowane kontaktowańske metody',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Diskusijny bok',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskusijny bok na drugem wikiju',
	'translationnotifications-cmethod-feed' => 'Kanal',
	'translationnotifications-frequency' => 'Kontaktowa cestosć',
	'translationnotifications-freq-always' => 'Pśecej, gž jo něco nowe za pśełožowanje',
	'translationnotifications-freq-week' => 'Maksimalnje raz na tyźeń',
	'translationnotifications-freq-month' => 'Maksimalnje raz na mjasec',
	'translationnotifications-freq-weekly' => 'Tyźeńska rozpšawa',
	'translationnotifications-freq-monthly' => 'Mjasecna rozpšawa',
	'translationnotifications-submit' => 'Nastajenja aktualizěrowaś',
	'translationnotifications-signup-success' => 'Nastajenja twójich pśełožowańskich powěźeńkow su se składowali.',
	'notifytranslators' => 'Pśełožowarjow informěrowaś',
	'translationnotifications-submit-ok' => 'Powěźeńki su se čakańskemu rědoju pśidali a dodawaju se pśez proces w slězynje.',
	'translationnotifications-send-notification-button' => 'Pśełožowarjam powěźeńku pósłaś',
	'translationnotifications-deadline-label' => 'Termin, kótaryž musy se w toś tej powěźeńce pódaś:',
	'translationnotifications-languages-to-notify-label' => 'Rěcy, kótarež maju se informěrowaś:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Rěcne kody źělone pśez komu; prozne wóstajiś, aby wšykne rěcy informěrowało.',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'wusoka',
	'translationnotifications-priority-medium' => 'srědna',
	'translationnotifications-priority-low' => 'niska',
	'translationnotifications-priority-unset' => '(njenastajona)',
	'translationnotifications-translatablepage-title' => 'Mě pśełožujobnego boka:',
	'translationnotifications-error-no-translatable-pages' => 'W toś tom wikiju žedne pśełožujobne boki njejsu.',
	'translationnotifications-email-subject' => 'Pšosym pśełož bok $1',
	'translationnotifications-email-body' => 'Witaj $1,

Dostawaš toś tu e-mail, dokulaž sy se ako pśełožowaŕ {{PLURAL:$9|za}} $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrěrował.

Dajo nowy bok, kótaryž musy se pśełožowaś: $3.
Móžoš jen pśełožiś, z tym až kliknjoš na slědujucy wótkaz:
$4

$5
$6

$7

Twója pomoc jo wjelgin witana. Pśełožowarje ako ty pomagaju, aby {{SITENAME}} ako napšawdu wěcejrěcne zgromaźeństwo funkcioněrował.

Wjeliki źěk!
Pśełožowańske koordinatory {{GRAMMAR:genitiw|{{SITENAME}}}}

----

Dostawaš toś tu e-mail, dokulaž sy se za dostaśe e-majlow wó pśełožkach na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrěrował. Aby dostaśe e-mailow wótskazał abo swóje zdźěleńske nastajenja změnił, źi pšosym k $8', # Fuzzy
	'translationnotifications-talkpage-body' => 'Witaj $2,

dostawaš toś tu powěźeńku, dokulaž sy se ako pśełožowaŕ za $3 na {{SITENAME}} zregistrěrował.
Bok [[$4]] stoj za pśełožowanje k dispoziciji. Móžoš jen how pśełožowaś:
$5

$6
$7

$8

Twója pomoc jo wjelgin witana. Pśełožowarje ako ty pomagaju, aby {{SITENAME}} ako napšawdu wěcejrěcne zgromaźeństwo funkcioněrował.

Wulki źěk!

Pśełožowańske koordinatory {{GRAMMAR:genitiw|{{SITENAME}}}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'do $1 pśełožiś',
	'translationnotifications-digestemail-subject' => 'E-mailowy pśeglěd za póžedane pśełožki wót {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'translationnotifications-digestemail-body' => 'Witaj $1,

dostawaš toś tu e-mail, dokulaž sy se ako pśełožowaŕ za $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrěrował.
{{PLURAL:$3|Jo 1 bok|Stej $3 boka|Su $3 boki|Jo $3 bokow}} za pśełožowanje k dispoziciji.  Drobnostki namakaš dołojce.

$4

Twója pomoc jo wjelgin witana. Pśełožowarje ako ty pomagaju, aby {{SITENAME}} ako napšawdu wěcejrěcne zgromaźeństwo funkcioněrował.

Wjeliki źěk!

{{SITENAME}} - pśełožowańske administratory

----

Dostawaš toś tu e-mail, dokulaž sy se za dostaśe e-majlow wó pśełožkach na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrěrował. Aby dostaśe e-mailow wótskazał abo swóje zdźěleńske nastajenja změnił, źi pšosym k <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Dnja $1 jo $2 bok "$3" za pśełožowanje markěrował. Móžoš ju na $4 pśełožowaś.',
	'translationnotifications-edit-summary' => 'Pśełožowańska powěźeńka: $1',
	'translationnotifications-email-priority' => 'Priorita toś togo boka jo $1.',
	'translationnotifications-email-deadline' => 'Termin za pśełožowanje toś togo boka jo $1.',
	'logentry-translationnotifications-sent' => '$1 jo powěźeńku wó pśełožowańskem boku $3 {{GENDER:$2|pósłał|posłała}}; rěcy: $4; termin $5; priorita $6; jo ju na {{PLURAL:$7|jadnogo dostawarja|$7 dostawarjowu|$7 dostawarjow|$7 dostawarjow}} {{GENDER:$2|pósłał|pósłała}}, jo se njeraźiła za {{PLURAL:$8|jadnogo dostawarja|$8 dostawarjowu$8 dostawarjow|$8 dostawarjow}}, jo se pśeskócyła za  {{PLURAL:$9|jadnogo dostawarja|$9 dostawarjowu|$9 dostawarjow|$9 dostawarjow}}.', # Fuzzy
	'log-name-notifytranslators' => 'Pśełožowańske powěźeńki',
	'log-description-notifytranslators' => 'Protokol wó powěžeńkach, kótarež su se pśełožowarjam wó pśełožujobnych bokach pósłali',
	'translationnotifications-sent-title' => 'Pśełožowańska powěźeńka jo se pósłała',
	'translationnotifications-sent-body' => 'Pśełožowańska powěźeńka jo se pósłała.',
	'translationnotifications-log-alllanguages' => 'wšykne rěcy',
	'translationnotifications-nodeadline' => 'žeden',
	'translationnotifications-signup-legal' => 'Pśez pódawanje toś tych informacijow zwólijoš, až móžomy se z tobu nastupajucy temy w zwisku {{GRAMMAR:instrumental|{{SITENAME}}}} do zwiska stajiś, kótarež by mógli śi zajimowaś. Zwólijoš do togo, až waše daty pódlaže našym [[{{MediaWiki:Privacypage}}|pšawidłam priwatnosći]].',
);

/** Esperanto (Esperanto)
 * @author Blahma
 * @author Yekrats
 */
$messages['eo'] = array(
	'translatorsignup' => 'Tradukista abono',
	'translatorsignup-summary' => 'En tiu ĉi paĝo indiku en kiujn lingvojn vi scias traduki kaj kiel oni kontaktu vin pri novaj tradukpetoj.',
	'translationnotifications-desc' => 'Permesi al tradukistoj aboni sciigojn pri tradukoj',
	'translationnotifications-info' => 'Informoj pri la uzanto',
	'translationnotifications-username' => 'Salutnomo:',
	'translationnotifications-emailstatus' => 'Repoŝta stato:',
	'translationnotifications-email-confirmed' => 'Via retpoŝtadreso ne estas konfirmita',
	'translationnotifications-email-disablemail' => 'Via retpoŝtadreso estas konfirmita, sed en [[Special:Preferences|viaj preferoj]] vi petis ne ricevadi retpoŝton.',
	'translationnotifications-email-unconfirmed' => 'Via retpoŝtadreso ne estas konfirmita. $1',
	'translationnotifications-email-notset' => 'Vi ne provizis retpoŝtadreson. Vi povas tion fari en viaj [[Special:Preferences|preferoj]].',
	'translationnotifications-languages' => 'Lingvoj',
	'translationnotifications-lang' => 'Lingvo #$1',
	'translationnotifications-nolang' => 'Elektu lingvon',
	'translationnotifications-contact' => 'Preferataj kontaktmetodoj',
	'translationnotifications-cmethod-email' => 'Retadreso',
	'translationnotifications-cmethod-talkpage' => 'Diskuto-paĝo',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskutpaĝo en alia vikio',
	'translationnotifications-cmethod-feed' => 'Fluo',
	'translationnotifications-frequency' => 'Kontaktofteco',
	'translationnotifications-freq-always' => 'Kiam estas nova tradukendaĵo',
	'translationnotifications-freq-week' => 'Maksimume unufoje semajne',
	'translationnotifications-freq-month' => 'Maksimume unufoje monate',
	'translationnotifications-freq-weekly' => 'Semajna kompilaĵo',
	'translationnotifications-freq-monthly' => 'Monata kompilaĵo',
	'translationnotifications-submit' => 'Ĝisdatigi la agordojn',
	'translationnotifications-signup-success' => 'Viaj preferoj pri traduksciigoj estas konservitaj.',
	'notifytranslators' => 'Sciigi tradukistojn',
	'translationnotifications-submit-ok' => 'Sciigoj estas envicigitaj kaj nun dissendiĝas helpe de fona procezo.',
	'translationnotifications-send-notification-button' => 'Sendi sciigon al tradukistoj',
	'translationnotifications-deadline-label' => 'Limdato indikota en tiu ĉi sciigo:',
	'translationnotifications-languages-to-notify-label' => 'Kiujn lingvojn sciigi:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Perkome disigita listo de lingvokodoj; lasu malplena por sciigi ĉiujn lingvojn.',
	'translationnotifications-priority' => 'Prioritato:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'meza',
	'translationnotifications-priority-low' => 'malalta',
	'translationnotifications-priority-unset' => '(neagordita)',
	'translationnotifications-translatablepage-title' => 'Nomo de la tradukenda paĝo:',
	'translationnotifications-error-no-translatable-pages' => 'En tiu ĉi vikio ekzistas neniuj tradukeblaj paĝoj.',
	'translationnotifications-email-subject' => 'Bonvolu traduki la paĝon $1',
	'translationnotifications-email-body' => 'Saluton $1,

vi ricevas tiun ĉi mesaĝon, ĉar vi registriĝis kiel tradukisto de {{PLURAL:$9|la lingvo|la lingvoj}} $2 ĉe {{SITENAME}}.

Ekzistas tradukebla paĝo ĉe: $3.
Vi povas ektraduki ĝin klakante la sekvan ligilon:
$4

$5
$6

$7

Ni tre aprezos vian helpon. Tradukistoj kiel vi helpas al {{SITENAME}} funkcii kiel vere multlingva komunumo.

Dankon!
traduk-kunordigantoj de {{SITENAME}}

----

Vi ricevas tiun ĉi mesaĝon ĉar vi abonis retmesaĝojn pri tradukoj ĉe {{SITENAME}}. Por malaboni aŭ ŝanĝi viajn sciigajn preferojn, bonvolu viziti $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Saluton $2,

vi ricevas tiun ĉi mesaĝon, ĉar vi registriĝis kiel tradukisto de {{PLURAL:$9|la lingvo|la lingvoj}} $2 ĉe {{SITENAME}}.
La paĝo [[$4]] estas tradukpreta. Vi povas traduki ĝin ĉe:
$5

$6
$7

$8

Ni tre aprezos vian helpon. Tradukistoj kiel vi helpas al {{SITENAME}} funkcii kiel vere multlingva komunumo.

Dankon!
traduk-kunordigantoj de {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'traduki al $1',
	'translationnotifications-digestemail-subject' => 'Retpoŝta kompilaĵo de tradukpetoj el {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Saluton $1,

vi ricevas tiun ĉi mesaĝon, ĉar vi registriĝis kiel tradukisto de $2 ĉe {{SITENAME}}.

Ekzistas {{PLURAL:$3|1 tradukpreta paĝo|$3 tradukpretaj paĝoj}}. Detaloj sekvas sube.

$4

Ni tre aprezos vian helpon. Tradukistoj kiel vi helpas al {{SITENAME}} funkcii kiel vere multlingva komunumo.

Dankon!
traduk-kunordigantoj de {{SITENAME}}

----

Vi ricevas tiun ĉi mesaĝon ĉar vi abonis retmesaĝojn pri tradukoj ĉe {{SITENAME}}. Por malaboni aŭ ŝanĝi viajn sciigajn preferojn, bonvolu viziti <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Je $1, $2 markis "$3" tradukpreta. Vi povas traduki ĝin ĉe $4',
	'translationnotifications-edit-summary' => 'Traduksciigo: $1',
	'translationnotifications-email-priority' => 'La prioritato de tiu ĉi paĝo estas $1.',
	'translationnotifications-email-deadline' => 'La limdato por traduko de tiu ĉi paĝo estas $1.',
	'logentry-translationnotifications-sent' => '$1 dissendis sciigon pri tradukado de la paĝo $3; lingvoj: $4; limdato: $5; prioritato: $6; sendita al {{PLURAL:$7|unu ricevanto|$7 ricevantoj}}, malsukcesis ĉe {{PLURAL:$8|unu ricevanto|$8 ricevantoj}}, preterpasita ĉe {{PLURAL:$9|unu ricevanto|$9 ricevantoj}}', # Fuzzy
	'log-name-notifytranslators' => 'Traduksciigoj',
	'log-description-notifytranslators' => 'Protokolo pri sciigoj pri tradukeblaj paĝoj dissenditaj al tradukistoj',
	'translationnotifications-sent-title' => 'Traduksciigo sendita',
	'translationnotifications-sent-body' => 'Traduksciigo estas sendita.',
	'translationnotifications-log-alllanguages' => 'ĉiuj lingvoj',
	'translationnotifications-nodeadline' => 'neniu',
	'translationnotifications-signup-legal' => 'Provizante tiun ĉi informon vi konsentas, ke ni povas vin kontakti pri temoj rilataj al {{SITENAME}} kiujn ni taksos interesaj por vi. Vi konsentas ke viaj datumoj subiĝas al nia [[{{MediaWiki:Privacypage}}|privateca politiko.]]',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Dferg
 */
$messages['es'] = array(
	'translatorsignup' => 'Inscripción de traductores',
	'translatorsignup-summary' => 'Utiliza esta página para indicar a qué idiomas puedes traducir y cómo deseas ser contactado sobre las nuevas solicitudes de traducción.',
	'translationnotifications-desc' => 'Permite a los traductores registrarse para recibir notificaciones de traducción',
	'translationnotifications-info' => 'Información de usuario',
	'translationnotifications-username' => 'Nombre de usuario:',
	'translationnotifications-emailstatus' => 'Estado de correo electrónico:',
	'translationnotifications-email-confirmed' => 'Su dirección de correo electrónico está confirmada',
	'translationnotifications-email-disablemail' => 'Tu dirección de correo electrónico se ha confirmado, pero en [[Special:Preferences|tus preferencias]] solicitaste no recibir correo electrónico.',
	'translationnotifications-email-unconfirmed' => 'No se ha confirmado su dirección de correo electrónico. $1',
	'translationnotifications-email-notset' => 'No ha proporcionado una dirección de correo electrónico. Puede hacerlo en sus [[Special:Preferences|preferencias]].',
	'translationnotifications-languages' => 'Idiomas',
	'translationnotifications-lang' => 'Idioma #$1',
	'translationnotifications-nolang' => 'Elija un idioma',
	'translationnotifications-contact' => 'Métodos de contactos preferidos',
	'translationnotifications-cmethod-email' => 'Correo electrónico',
	'translationnotifications-cmethod-talkpage' => 'Página de discusión',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Página de discusión en otro wiki',
	'translationnotifications-cmethod-feed' => 'Fuente web',
	'translationnotifications-frequency' => 'Frecuencia de contacto',
	'translationnotifications-freq-always' => 'Cuando haya algo nuevo para traducir',
	'translationnotifications-freq-week' => 'Más de una vez por semana',
	'translationnotifications-freq-month' => 'Al menos una vez al mes',
	'translationnotifications-freq-weekly' => 'Boletín semanal',
	'translationnotifications-freq-monthly' => 'Boletín mensual',
	'translationnotifications-submit' => 'Actualizar la configuración',
	'translationnotifications-signup-success' => 'Se han guardado tus preferencias de notificación de traducciones.',
	'notifytranslators' => 'Notificar a los traductores',
	'translationnotifications-submit-ok' => 'Las notificaciones se han añadido a una cola y son enviadas mediante una tarea en segundo plano.',
	'translationnotifications-send-notification-button' => 'Enviar una notificación a los traductores',
	'translationnotifications-deadline-label' => 'Fecha límite a indicar en esta notificación:',
	'translationnotifications-languages-to-notify-label' => 'Idiomas en los que notificar:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Códigos de idioma separados por comas; dejar en blanco para notificar en todos los idiomas.',
	'translationnotifications-priority' => 'Prioridad:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'media',
	'translationnotifications-priority-low' => 'baja',
	'translationnotifications-priority-unset' => '(no definida)',
	'translationnotifications-translatablepage-title' => 'Nombre de la página traducible:',
	'translationnotifications-error-no-translatable-pages' => 'No hay páginas traducibles en este wiki.',
	'translationnotifications-email-subject' => 'Por favor traduzca la página $1',
	'translationnotifications-email-body' => 'Hola $1,

Estás recibiendo este mensaje de correo electrónico porque te inscribiste como traductor al idioma $2 de {{SITENAME}}.

Aquí hay una página para traducir: $3.
Puedes traducirla haciendo clic en el enlace siguiente:
$4

$5
$6

$7

Agradecemos enormemente tu ayuda. Traductores como tu hacen que {{SITENAME}} funcione
como una verdadera comunidad multilingüe.

¡Gracias!
Los coordinadores de traducción de {{SITENAME}}

----

Estás recibiendo este mensaje porque te suscribiste para recibir correos electrónicos relacionados con traducciones de {{SITENAME}}. Para cancelar la suscripción o cambiar tus preferencias de notificación para las traducciones, por favor visita $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Hola $2,

Estás recibiendo esta notificación porque te inscribiste como traductor  de {{SITENAME}} en $3.

La página [[$4]] está disponible para su traducción. Puedes  traducirla aquí:
$5

$6
$7

$8

Agradecemos enormemente tu ayuda. Traductores como tú hacen que {{SITENAME}} funcione
como una verdadera comunidad multilingüe.
¡Gracias!

Los coordinadores de traducción de {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'traducir al $1',
	'translationnotifications-digestemail-subject' => 'Correo electrónico de resumen para solicitudes de traducción de {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hola $1,

Estás recibiendo este mensaje porque te inscribiste como traductor de {{SITENAME}} al $2.

Hay {{PLURAL:$3|1 página|$3 páginas}} disponibles para su traducción. A continuación figuran los detalles.

$4

Agradecemos enormemente tu ayuda. Traductores como tú hacen que {{SITENAME}} funcione
como una verdadera comunidad multilingüe.

¡Gracias!
Los administradores de traducción de {{SITENAME}}

----

Estás recibiendo este mensaje porque te suscribiste para recibir correos electrónicos relacionados con traducciones de {{SITENAME}}. Para cancelar la suscripción o cambiar tus preferencias de notificación para las traducciones, por favor visita <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'En $1, $2  ha marcado "$3" para su traducción. Puede traducirlo en $4',
	'translationnotifications-edit-summary' => 'Notificación de traducción: $1',
	'translationnotifications-email-priority' => 'La prioridad de esta página es  $1.',
	'translationnotifications-email-deadline' => 'La fecha límite para la traducción de esta página es  $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|ha enviado}} una notificación sobre la traducción de la página $3; idiomas: $4; fecha límite: $5; prioridad: $6; ha llegado a {{PLURAL:$7|un destinatario|$7  destinatarios}}, ha fallado en {{PLURAL:$8|un destinatario|$8 destinatarios}}, ha omitido a {{PLURAL:$9|un destinatario|$9 destinatarios}}', # Fuzzy
	'log-name-notifytranslators' => 'Notificaciones de traducción',
	'log-description-notifytranslators' => 'Un registro de las notificaciones enviadas a los traductores sobre las páginas traducibles',
	'translationnotifications-sent-title' => 'Notificación de traducción enviada',
	'translationnotifications-sent-body' => 'Se ha enviado la notificación de traducción.',
	'translationnotifications-log-alllanguages' => 'todos los idiomas',
	'translationnotifications-nodeadline' => 'ninguno',
	'translationnotifications-signup-legal' => 'Usted acepta que al suministrar esta información nosotros podamos ponernos en contacto con usted en relación con temas relacionados con {{SITENAME}} que pensemos puedan ser de interés para usted. Usted acepta que sus datos puedan ser almacenados en los Estados Unidos de América y estar sujetos a nuestra [[{{MediaWiki:Privacypage}}|política de protección de datos.]]',
);

/** Estonian (eesti)
 * @author Pikne
 */
$messages['et'] = array(
	'translatorsignup' => 'Tõlkijana ülesandmine',
	'translatorsignup-summary' => 'Kasuta seda lehekülge, et näidata, millistesse keeltesse oskad tõlkida ja et määrata, kuidas sulle uutest tõlkepalvetest teatada.',
	'translationnotifications-desc' => 'Võimaldab tõlkijatel tõlketeavitusi tellida.',
	'translationnotifications-info' => 'Kasutajateave',
	'translationnotifications-username' => 'Kasutajanimi:',
	'translationnotifications-emailstatus' => 'E-posti olek:',
	'translationnotifications-email-confirmed' => 'Sinu e-posti aadress on kinnitatud.',
	'translationnotifications-email-disablemail' => 'Sinu e-posti aadress on kinnitatud, aga oled [[Special:Preferences|eelistustes]] määranud, et ei soovi e-kirju saada.',
	'translationnotifications-email-unconfirmed' => 'Sinu e-posti aadress on kinnitamata. $1',
	'translationnotifications-email-notset' => 'Sa pole e-posti aadressi esitanud. Saad seda teha [[Special:Preferences|eelistustes]].',
	'translationnotifications-languages' => 'Keeled',
	'translationnotifications-lang' => '$1. keel',
	'translationnotifications-nolang' => 'Vali keel',
	'translationnotifications-contact' => 'Eelistatud teavitusviisid',
	'translationnotifications-cmethod-email' => 'E-kiri',
	'translationnotifications-cmethod-talkpage' => 'Arutelulehekülg',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Arutelulehekülg teises vikis',
	'translationnotifications-frequency' => 'Teavitussagedus',
	'translationnotifications-freq-always' => 'Alati, kui on midagi uut tõlkida',
	'translationnotifications-freq-week' => 'Mitte enam kui kord nädalas',
	'translationnotifications-freq-month' => 'Mitte enam kui kord kuus',
	'translationnotifications-freq-weekly' => 'Nädala ülevaade',
	'translationnotifications-freq-monthly' => 'Kuu ülevaade',
	'translationnotifications-submit' => 'Uuenda sätteid',
	'translationnotifications-signup-success' => 'Sinu tõlketeavituse eelistused salvestati.',
	'notifytranslators' => 'Tõlkijate teavitamine',
	'translationnotifications-submit-ok' => 'Teavitused on lisatud tööjärge ja need lähetab taustprotsess.',
	'translationnotifications-send-notification-button' => 'Saada teavitus tõlkijatele',
	'translationnotifications-deadline-label' => 'Tähtaeg, mis selles teavituses tuuakse:',
	'translationnotifications-languages-to-notify-label' => 'Keeled, mida teavitus puudutab:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Komaga eraldatud keelekoodid; jäta tühjaks, et teavitada kõiki keeli.',
	'translationnotifications-priority' => 'Tähtsus:',
	'translationnotifications-priority-high' => 'väga oluline',
	'translationnotifications-priority-medium' => 'keskmise tähtsusega',
	'translationnotifications-priority-low' => 'väheoluline',
	'translationnotifications-priority-unset' => '(määramata)',
	'translationnotifications-translatablepage-title' => 'Tõlgitava lehekülje pealkiri:',
	'translationnotifications-error-no-translatable-pages' => 'Tõlgitavad leheküljed puuduvad selles vikis.',
	'translationnotifications-email-subject' => 'Palun tõlgi lehekülg $1',
	'translationnotifications-email-body' => 'Tere, $1.

Said selle e-kirja, sest {{GENDER:$10|andsid}} võrgukohas {{SITENAME}} end üles $2 {{PLURAL:$9|keelde}} tõlkijana.

Tõlkimiseks on järgmine lehekülg: $3.
Et see tõlkida, klõpsa palun järgmisele lingile:
$4

$5
$6

$7

Sinu abi on kõrgelt hinnatud. Sinusugused tõlkijad aitavad võrgukohal {{SITENAME}} talitleda
tõelise paljukeelse kogukonnana.

Aitäh!
Tõlkekoordineerijad
{{SITENAME}}

----

Said selle e-kirja, sest tellisid võrgukohast {{SITENAME}} tõlgetega seotud e-kirjad. Et neist kirjadest loobuda või et teavituseelistusi muuta, külasta lehekülge $8.',
	'translationnotifications-talkpage-body' => 'Tere, $2.

Said selle e-kirja, sest {{GENDER:$1|andsid}} võrgukohas {{SITENAME}} end üles {{PLURAL:$9|$3}} keelde tõlkijana.
Lehekülg [[$4]] on saadaval tõlkimiseks. Palun tõlgi see siin:
$5

$6
$7

$8

Sinu abi on kõrgelt hinnatud. Sinusugused tõlkijad aitavad võrgukohal {{SITENAME}} talitleda
tõelise paljukeelse kogukonnana.

Aitäh!

Tõlkekoordineerijad
{{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'tõlgi $1 keelde',
	'translationnotifications-digestemail-subject' => 'Tõlkepalvete ülevaade võrgukohast {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Tere, $1.

Said selle e-kirja, sest {{GENDER:$1|andsid}} võrgukohas {{SITENAME}} end üles $2 keelde tõlkijana.
{{PLURAL:$3|Üks lehekülg|$3 lehekülge}} on tõlkida. Üksikasjad leiad altpoolt.

$4

Sinu abi on kõrgelt hinnatud. Sinusugused tõlkijad aitavad võrgukohal {{SITENAME}} talitleda
tõelise paljukeelse kogukonnana.

Aitäh!
Tõlkekoordineerijad
{{SITENAME}}

----

Said selle e-kirja, sest tellisid võrgukohast {{SITENAME}} tõlgetega seotud e-kirjad. Et neist kirjadest loobuda või et teavituseelistusi muuta, külasta lehekülge <$5>.',
	'translationnotifications-digestemail-notification-line' => '$1: $2 märkis lehekülje "$3" tõlkimiseks. Saad selle tõlkida siin: $4.',
	'translationnotifications-edit-summary' => 'Tõlketeavitus: $1',
	'translationnotifications-email-priority' => 'Selle lehekülje tõlkimine on $1.',
	'translationnotifications-email-deadline' => 'Selle tõlke tähtaeg on $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|saatis}} teavituse lehekülje $3 tõlkimise kohta; {{PLURAL:$10|keel|keeled}}: $4; tähtaeg: $5; tähtsus: $6; saadetud {{PLURAL:$7|ühele|$7}} tõlkijale, {{PLURAL:$8|ühele|$8}} tõlkijale saatmine ebaõnnestus, {{PLURAL:$9|üks tõlkija|$9 tõlkijat}} vahele jäetud',
	'log-name-notifytranslators' => 'Tõlketeavitused',
	'log-description-notifytranslators' => 'Tõlkijatele lehekülgede tõlkimise kohta saadetud teavituste logi',
	'translationnotifications-sent-title' => 'Tõlketeavitus saadetud',
	'translationnotifications-sent-body' => 'Tõlketeavitus saadeti.',
	'translationnotifications-log-alllanguages' => 'kõik keeled',
	'translationnotifications-nodeadline' => 'puudub',
	'translationnotifications-signup-legal' => 'Nõustud, et nende andmete saatmise järel võime sinuga ühendust võtta võrgukohaga {{SITENAME}} seotud teemadel, mis meie arvates sulle huvi võivad pakkuda. Nõustud, et sinu andmeid kasutatakse vastavalt meie [[{{MediaWiki:Privacypage}}|privaatsuspõhimõtetele]].',
);

/** Basque (euskara)
 * @author පසිඳු කාවින්ද
 */
$messages['eu'] = array(
	'translationnotifications-username' => 'Lankide izena:',
	'translationnotifications-languages' => 'Hizkuntzak',
	'translationnotifications-cmethod-email' => 'E-posta',
	'translationnotifications-cmethod-talkpage' => 'Eztabaida-orria',
	'translationnotifications-priority' => 'Lehentasuna:',
	'translationnotifications-log-alllanguages' => 'hizkuntza guztiak',
	'translationnotifications-nodeadline' => 'bat ere ez',
);

/** Persian (فارسی)
 * @author Mjbmr
 * @author Reza1615
 */
$messages['fa'] = array(
	'translatorsignup' => 'ثبت نام مترجم',
	'translationnotifications-info' => 'اطلاعات کاربر',
	'translationnotifications-username' => 'نام کاربری:',
	'translationnotifications-emailstatus' => 'وضعیت پست الکترونیکی:',
	'translationnotifications-email-confirmed' => 'نشانی پست الکترونیک تائید شده‌است',
	'translationnotifications-languages' => 'زبان‌ها',
	'translationnotifications-lang' => 'زبان شماره $1',
	'translationnotifications-nolang' => 'یک زبان را انتخاب کنید',
	'translationnotifications-contact' => 'روش تماس مطلوب',
	'translationnotifications-cmethod-email' => 'پست الکترونیکی',
	'translationnotifications-cmethod-talkpage' => 'صفحهٔ بحث',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'صفحهٔ بحث در ویکی دیگر',
	'translationnotifications-cmethod-feed' => 'خبرخوان',
	'translationnotifications-frequency' => 'تناوب تماس',
	'translationnotifications-freq-always' => 'هنگامی که چیز جدیدی برای ترجمه وجود دارد',
	'translationnotifications-freq-week' => 'یکبار در هفته',
	'translationnotifications-freq-month' => 'یکبار در ماه',
	'translationnotifications-freq-weekly' => 'خلاصهٔ هفتگی',
	'translationnotifications-freq-monthly' => 'حلاصهٔ یک ماه',
	'translationnotifications-submit' => 'تنظیمات به‌روز رسانی',
	'translationnotifications-priority' => 'اولویت:',
	'translationnotifications-priority-high' => 'بالا',
	'translationnotifications-priority-medium' => 'متوسط',
	'translationnotifications-priority-low' => 'کم',
	'translationnotifications-log-alllanguages' => 'همۀ زبان‌ها',
	'translationnotifications-nodeadline' => 'هیچ‌کدام',
);

/** Finnish (suomi)
 * @author Beluga
 * @author Nike
 * @author Olli
 */
$messages['fi'] = array(
	'translatorsignup' => 'Kääntäjäksi liittyminen',
	'translatorsignup-summary' => 'Käytä tätä sivua liittyäksesi haluamiesi kielten kääntäjiksi, ja ilmoittaaksesi kuinka haluat käännöksiin liittyvien yhteydenottojen tapahtuvan.',
	'translationnotifications-desc' => 'Sallii kääntäjien ottaa ilmoitukset käännöksistä käyttöön',
	'translationnotifications-info' => 'Käyttäjätiedot',
	'translationnotifications-username' => 'Käyttäjätunnus:',
	'translationnotifications-emailstatus' => 'Sähköpostin tila:',
	'translationnotifications-email-confirmed' => 'Sähköpostiosoite vahvistettiin',
	'translationnotifications-email-disablemail' => 'Sähköpostiosoitteesi on vahvistettu, mutta [[Special:Preferences|asetuksissasi]] olet valinnut, että et halua vastaanottaa sähköpostia.',
	'translationnotifications-email-unconfirmed' => 'Sähköpostiosoitettasi ei vahvistettu. $1',
	'translationnotifications-email-notset' => 'Et ole antanut sähköpostiosoitetta. Voit antaa sen [[Special:Preferences|asetuksissa]].',
	'translationnotifications-languages' => 'Kielet',
	'translationnotifications-lang' => 'Kieli #$1',
	'translationnotifications-nolang' => 'Valitse kieli',
	'translationnotifications-contact' => 'Halutut yhteydenottotavat',
	'translationnotifications-cmethod-email' => 'Sähköposti',
	'translationnotifications-cmethod-talkpage' => 'Keskustelusivu',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Keskustelusivuni tässä wikissä:',
	'translationnotifications-cmethod-feed' => 'Syöte',
	'translationnotifications-frequency' => 'Yhteydenottoväli',
	'translationnotifications-freq-always' => 'Heti, kun uutta käännettävää on tarjolla',
	'translationnotifications-freq-week' => 'Enintään kerran viikossa',
	'translationnotifications-freq-month' => 'Enintään kerran kuukaudessa',
	'translationnotifications-freq-weekly' => 'Viikottainen tiivistelmä',
	'translationnotifications-freq-monthly' => 'Kuukausittainen tiivistelmä',
	'translationnotifications-submit' => 'Päivitä asetukset',
	'translationnotifications-signup-success' => 'Käännöksien ilmoitusasetukset tallennettiin.',
	'notifytranslators' => 'Käännösilmoitukset',
	'translationnotifications-submit-ok' => 'Ilmoitukset on lisätty jonoon ja ne tullaan toimittamaan taustatehtävänä.',
	'translationnotifications-send-notification-button' => 'Lähetä ilmoitus kääntäjille',
	'translationnotifications-deadline-label' => 'Ilmoituksessa kerrottava käännöksen määräaika:',
	'translationnotifications-languages-to-notify-label' => 'Minkä kielten kääntäjiä ilmoitetaan:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Pilkulla erotellut kielikoodit; jos haluat ilmoittaa kaikkien kielien kääntäjille, jätä tyhjäksi.',
	'translationnotifications-priority' => 'Prioriteetti:',
	'translationnotifications-priority-high' => 'korkea',
	'translationnotifications-priority-medium' => 'keskiverto',
	'translationnotifications-priority-low' => 'matala',
	'translationnotifications-priority-unset' => '(ei asetettu)',
	'translationnotifications-translatablepage-title' => 'Käännettävän sivun nimi:',
	'translationnotifications-error-no-translatable-pages' => 'Tässä wikissä ei ole käännettäviä sivuja.',
	'translationnotifications-email-subject' => 'Ole hyvä ja käännä sivu $1',
	'translationnotifications-email-body' => 'Hei $1,

Saat tämän sähköpostiviestin, koska olet ilmoittanut kielen/kielten $2 kääntäjäksi sivustolla {{SITENAME}}.

Seuraava sivu on nyt saatavilla käännettäväksi: $3.
Voit kääntää sen seuraavaa linkkiä napsauttamalla:
$4

$5
$6

$7

Apuasi arvostetaan. Sinunlaisesi kääntäjät pitävät sivuston {{SITENAME}} toiminnassa
monikielisenä yhteisönä.

Kiitos!
Sivuston {{SITENAME}} käännösvastaavat

----

Vastaanotat tämän sähköpostin, koska olet ottanut käyttöön sähköposti-ilmoitukset käännöksistä sivustolla  {{SITENAME}}. Jos haluat poistaa ilmoitukset käytöstä tai muuttaa asetuksia, ole hyvä ja käy $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Hei $2,

Saat tämän ilmoituksen, koska olet liittynyt kielen/kielten $3 kääntäjäksi sivustolla {{SITENAME}}.
Sivu [[$4]] on saatavilla käännettäväksi. Voit kääntää sen osoitteessa:
$5

$6
$7

$8

Apuasi arvostetaan. Sinuntapaisesi kääntäjät pitävät sivuston {{SITENAME}} toiminnassa
monikielisenä yhteisönä.

Kiitos!

Sivuston {{SITENAME}} käännösvastaavat', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'käännä kielelle $1',
	'translationnotifications-digestemail-subject' => 'Yhteenveto sivuston {{SITENAME}} käännöspyynnöistä',
	'translationnotifications-digestemail-body' => 'Hei $1,

Saat tämän sähköpostiviestin, koska olet ilmoittanut kielen/kielten $2 kääntäjäksi sivustolla {{SITENAME}}.

Saatavilla on $3 siv{{PLURAL:$3|u|ua}} käännettäväksi. Tarkemmat tiedot annetaan alla.

$4

Apuasi arvostetaan. Sinunlaisesi kääntäjät pitävät sivuston {{SITENAME}} toiminnassa
monikielisenä yhteisönä.

Kiitos!
Sivuston {{SITENAME}} käännösvastaavat

----

Vastaanotat tämän sähköpostin, koska olet ottanut käyttöön sähköposti-ilmoitukset käännöksistä sivustolla  {{SITENAME}}. Jos haluat poistaa ilmoitukset käytöstä tai muuttaa asetuksia, ole hyvä ja käy sivulla <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => '($1) $2 ilmoitti sivun "$3" käännettäväksi. Voit kääntää sen osoitteessa $4',
	'translationnotifications-edit-summary' => 'Ilmoitus käännöksestä: $1',
	'translationnotifications-email-priority' => 'Tämän sivun tärkeysaste on $1.',
	'translationnotifications-email-deadline' => 'Tämä sivu tulisi kääntää viimeistään $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|lähetti}} ilmoituksen sivun $3 kääntämisestä; kielet: $4; määräaika: $5; tärkeysaste: $6; lähetettiin {{PLURAL:$7|yhdelle kääntäjälle|$7 kääntäjälle}}, epäonnistui {{PLURAL:$8|yhdelle kääntäjälle|$8 kääntäjälle}}, ohitettiin {{PLURAL:$9|yhdelle kääntäjälle|$9 kääntäjälle}}', # Fuzzy
	'log-name-notifytranslators' => 'Ilmoitukset käännöksistä',
	'log-description-notifytranslators' => 'Loki ilmoituksista, jotka on lähetetty kääntäjille käännettävistä sivuista',
	'translationnotifications-sent-title' => 'Käännösilmoitus lähetetty',
	'translationnotifications-sent-body' => 'Käännösilmoitus lähetettiin.',
	'translationnotifications-log-alllanguages' => 'kaikki kielet',
	'translationnotifications-nodeadline' => 'ei mitään',
	'translationnotifications-signup-legal' => 'Antamalla nämä tiedot, vahvistat, että voimme ottaa sinuun yhteyttä sivustoon {{SITENAME}} liittyvissä asioissa, joiden arvelemme kiinnostavan sinua. Hyväksyt, että tietojasi käytetään  [[{{MediaWiki:Privacypage}}|yksityisyydensuojan]] alaisena.',
);

/** French (français)
 * @author Brunoperel
 * @author Cquoi
 * @author DavidL
 * @author Gomoko
 * @author Tititou36
 * @author Urhixidur
 * @author Verdy p
 * @author Wyz
 */
$messages['fr'] = array(
	'translatorsignup' => 'Connexion du traducteur',
	'translatorsignup-summary' => 'Utilisez cette page pour indiquer dans quelles langues vous pouvez traduire, et comment vous souhaitez être contacté sur les nouvelles demandes de traduction.',
	'translationnotifications-desc' => "Permet aux traducteurs de s'inscrire pour des notifications de traduction",
	'translationnotifications-info' => "Information sur l'utilisateur",
	'translationnotifications-username' => 'Nom d’utilisateur :',
	'translationnotifications-emailstatus' => 'État du courriel:',
	'translationnotifications-email-confirmed' => 'Votre adresse de courriel est confirmée',
	'translationnotifications-email-disablemail' => 'Votre adresse de courriel est confirmée, mais dans [[Special:Preferences|vos préférences]] vous avez demandé à ne plus recevoir de correspondance électronique.',
	'translationnotifications-email-unconfirmed' => "Votre adresse de courriel n'est pas confirmée. $1",
	'translationnotifications-email-notset' => "Vous n'avez pas fourni d'adresse de courriel. Vous pouvez le faire dans vos [[Special:Preferences|préférences]].",
	'translationnotifications-languages' => 'Langues',
	'translationnotifications-lang' => 'Langue #$1',
	'translationnotifications-nolang' => 'Choisir une langue',
	'translationnotifications-contact' => 'Moyens de contact préférés',
	'translationnotifications-cmethod-email' => 'Courriel',
	'translationnotifications-cmethod-talkpage' => 'Page de discussion',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Page de discussion sur un autre wiki',
	'translationnotifications-cmethod-feed' => 'Alimentation',
	'translationnotifications-frequency' => 'Fréquence de contact',
	'translationnotifications-freq-always' => 'Quand il y a quelque chose de nouveau à traduire',
	'translationnotifications-freq-week' => 'Au moins une fois par semaine',
	'translationnotifications-freq-month' => 'Au moins une fois par mois',
	'translationnotifications-freq-weekly' => 'Résumé hebdomadaire',
	'translationnotifications-freq-monthly' => 'Résumé mensuel',
	'translationnotifications-submit' => 'Mettre à jour les paramètres',
	'translationnotifications-signup-success' => 'Vos préférences de notification de traduction ont été sauvées.',
	'notifytranslators' => 'Informer les traducteurs',
	'translationnotifications-submit-ok' => "Des notifications ont été ajoutées à une file d'attente et sont livrées par une tâche d'arrière-plan.",
	'translationnotifications-send-notification-button' => 'Envoyer une notification aux traducteurs',
	'translationnotifications-deadline-label' => 'Date limite à indiquer dans cette notification:',
	'translationnotifications-languages-to-notify-label' => 'Langues à notifier :',
	'translationnotifications-languages-to-notify-label-help-message' => 'Codes de langue séparés par des virgules; laissez vide pour notifier toutes les langues.',
	'translationnotifications-priority' => 'Priorité:',
	'translationnotifications-priority-high' => 'haute',
	'translationnotifications-priority-medium' => 'moyenne',
	'translationnotifications-priority-low' => 'basse',
	'translationnotifications-priority-unset' => '(non défini)',
	'translationnotifications-translatablepage-title' => 'Nom de la page à traduire:',
	'translationnotifications-error-no-translatable-pages' => "Il n'y a aucune page à traduire dans ce wiki.",
	'translationnotifications-email-subject' => 'Veuillez traduire la page $1',
	'translationnotifications-email-body' => 'Bonjour $1,

Vous recevez ce courriel parce que vous vous êtes {{GENDER:$10|inscrit|inscrite}} comme {{GENDER:$10|traducteur|traductrice}} {{PLURAL:$9|de}} $2 sur {{SITENAME}}.

Il y a une page à traduire ici : $3.
Vous pouvez la traduire en cliquant sur le lien suivant :
$4

$5
$6

$7


Merci !
Les coordonnateurs de traduction de {{SITENAME}}

----
Vous recevez ce courriel parce que vous avez signé pour recevoir des courriels concernant les traductions sur {{SITENAME}}. Pour vous désabonner ou modifier vos préférences de notification pour les traductions, veuillez visiter $8.',
	'translationnotifications-talkpage-body' => 'Bonjour $2,

Vous recevez cette notification parce que vous êtes {{GENDER:$1|inscrit|inscrite}} comme {{GENDER:$1|traducteur|traductrice}} de {{PLURAL:$9|$3}} sur {{SITENAME}}.
La page [[$4]] est disponible pour la traduction. Vous pouvez la traduire ici:
$5

$6
$7

$8

Votre aide est grandement appréciée. Des traducteurs comme vous aident {{SITENAME}} à fonctionner comme une communauté réellement multilingue.

Merci !

Les coordinateurs de la traduction de {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'traduire en $1',
	'translationnotifications-digestemail-subject' => 'Courriel de synthèse pour les demandes de traduction de {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Bonjour $1,

Vous recevez ce courriel parce que vous  vous êtes {{GENDER:$1|inscrit|inscrite}} comme {{GENDER:$1|traducteur|traductrice}} de $2 sur {{SITENAME}}.

{{PLURAL:$3|1 page est disponible|$3 pages sont disponibles}} pour la traduction. Les détails sont donnés ci-dessous.

$4

Votre aide est grandement appréciée. Les traducteurs comme vous aider à {{SITENAME}} de la fonction
comme une véritable communauté multilingue.

Merci!
Les administrateurs de la traduction de {{SITENAME}}

----

Vous recevez ce courriel parce que vous avez souscrit à la réception de courriels concernant les traductions sur {{SITENAME}}. Pour modifier vos préférences de notification pour les traductions, veuillez visiter  <$5>.',
	'translationnotifications-digestemail-notification-line' => 'Sur $1, $2 a marqué "$3" pour être traduit. Vous pouvez le traduire sur $4',
	'translationnotifications-edit-summary' => 'Notification de traduction : $1',
	'translationnotifications-email-priority' => 'La priorité de cette page est $1.',
	'translationnotifications-email-deadline' => 'La date limite pour traduire cette page est $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|a envoyé}} une notification sur la traduction de la page $3; {{PLURAL:$1|langue|langues}}: $4; délai limite: $5; priorité: $6; envoyé à {{PLURAL:$7|un destinataire|$7 destinataires}}, échec pour {{PLURAL:$8|un destinataire|$8 destinataires}}, sauté pour {{PLURAL:$9|un destinataire|$9 destinataires}}',
	'log-name-notifytranslators' => 'Notifications de traduction',
	'log-description-notifytranslators' => 'Un journal des notifications envoyées aux traducteurs sur les pages à traduire',
	'translationnotifications-sent-title' => 'Notification de traduction envoyée',
	'translationnotifications-sent-body' => 'La notification de la traduction a été envoyée.',
	'translationnotifications-log-alllanguages' => 'toutes les langues',
	'translationnotifications-nodeadline' => 'aucune',
	'translationnotifications-signup-legal' => "En fournissant cette information, vous acceptez que nous puissions vous contacter concernant des sujets liés à {{SITENAME}} que nous pensons qu'ils soient intéressant pour vous. Vous acceptez que vos données soient soumises à notre [[{{MediaWiki:Privacypage}}|politique de confidentialité]].",
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'translationnotifications-info' => 'Enformacions sur l’utilisator',
	'translationnotifications-username' => 'Nom d’utilisator :',
	'translationnotifications-emailstatus' => 'Ètat du mèssâjo :',
	'translationnotifications-languages' => 'Lengoues',
	'translationnotifications-lang' => 'Lengoua numerô $1',
	'translationnotifications-nolang' => 'Chouèsésséd na lengoua',
	'translationnotifications-cmethod-email' => 'Mèssageria èlèctronica',
	'translationnotifications-cmethod-talkpage' => 'Pâge de discussion',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pâge de discussion sur un ôtro vouiqui',
	'translationnotifications-cmethod-feed' => 'Flux',
	'translationnotifications-priority' => 'Prioritât :',
	'translationnotifications-priority-high' => 'hôta',
	'translationnotifications-priority-medium' => 'moyena',
	'translationnotifications-priority-low' => 'bâssa',
	'translationnotifications-priority-unset' => '(pas dèfenia)',
	'translationnotifications-notification-url-listitem' => 'traduire en $1',
	'translationnotifications-edit-summary' => 'Notificacion de traduccion : $1',
	'translationnotifications-log-alllanguages' => 'totes les lengoues',
	'translationnotifications-nodeadline' => 'niona',
);

/** Irish (Gaeilge)
 * @author පසිඳු කාවින්ද
 */
$messages['ga'] = array(
	'translationnotifications-username' => "D'ainm úsáideora:",
	'translationnotifications-cmethod-email' => 'Ríomhphost',
	'translationnotifications-nodeadline' => 'Tada',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'translatorsignup' => 'Inscrición de tradutores',
	'translatorsignup-summary' => 'Use esta páxina para indicar as linguas que poida traducir e como quere que nos poñamos en contacto con vostede para enviarlle solicitudes de tradución.',
	'translationnotifications-desc' => 'Permite aos tradutores inscribirse para recibir notificacións sobre as traducións',
	'translationnotifications-info' => 'Información de usuario',
	'translationnotifications-username' => 'Nome de usuario:',
	'translationnotifications-emailstatus' => 'Estado do correo electrónico:',
	'translationnotifications-email-confirmed' => 'O seu enderezo de correo electrónico está confirmado',
	'translationnotifications-email-disablemail' => 'O seu enderezo de correo electrónico está confirmado, pero nas [[Special:Preferences|súas preferencias]] pediu non recibir correos electrónicos.',
	'translationnotifications-email-unconfirmed' => 'O seu enderezo de correo electrónico non está confirmado. $1',
	'translationnotifications-email-notset' => 'Non proporcionou enderezo de correo electrónico ningún. Pódeo facer nas súas [[Special:Preferences|preferencias]].',
	'translationnotifications-languages' => 'Linguas',
	'translationnotifications-lang' => 'Lingua nº$1',
	'translationnotifications-nolang' => 'Escolla unha lingua',
	'translationnotifications-contact' => 'Métodos de contacto preferidos',
	'translationnotifications-cmethod-email' => 'Correo electrónico',
	'translationnotifications-cmethod-talkpage' => 'Páxina de conversa',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Páxina de conversa noutro wiki',
	'translationnotifications-cmethod-feed' => 'Fonte de novas',
	'translationnotifications-frequency' => 'Frecuencia de contacto',
	'translationnotifications-freq-always' => 'Cando haxa algo novo que traducir',
	'translationnotifications-freq-week' => 'Unha vez á semana, polo menos',
	'translationnotifications-freq-month' => 'Unha vez ao mes, polo menos',
	'translationnotifications-freq-weekly' => 'Boletín semanal',
	'translationnotifications-freq-monthly' => 'Boletín mensual',
	'translationnotifications-submit' => 'Actualizar a configuración',
	'translationnotifications-signup-success' => 'Gardáronse as súas preferencias sobre a notificación de traducións.',
	'notifytranslators' => 'Informar aos tradutores',
	'translationnotifications-submit-ok' => 'As notificacións engadíronse a unha cola de espera; un proceso ha envialas en segundo plano.',
	'translationnotifications-send-notification-button' => 'Enviar unha notificación aos tradutores',
	'translationnotifications-deadline-label' => 'Data límite a indicar nesta notificación:',
	'translationnotifications-languages-to-notify-label' => 'Linguas ás que enviar a notificación:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Códigos de lingua separados por comas; déixeo en branco para notificar a todas as linguas.',
	'translationnotifications-priority' => 'Prioridade:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'media',
	'translationnotifications-priority-low' => 'baixa',
	'translationnotifications-priority-unset' => '(non definida)',
	'translationnotifications-translatablepage-title' => 'Nome da páxina traducible:',
	'translationnotifications-error-no-translatable-pages' => 'Non hai páxinas que se poidan traducir neste wiki.',
	'translationnotifications-email-subject' => 'Por favor, traduza a páxina "$1"',
	'translationnotifications-email-body' => 'Boas, $1:

Recibiu este correo electrónico porque está {{GENDER:$10|inscrito|inscrita}} como {{GENDER:$10|tradutor|tradutora}} {{PLURAL:$9|ao}} $2 en {{SITENAME}}.

Hai unha páxina que traducir alí: $3.
Pode traducila premendo na seguinte ligazón:
$4

$5
$6

$7

Agradecemos enormemente a súa axuda. Os tradutores coma vostede fan que {{SITENAME}} funcione
como unha gran comunidade multilingüe.

Grazas!
Os coordinadores das traducións de {{SITENAME}}

----

Recibiu este correo electrónico porque se inscribiu para recibir correos electrónicos relacionados coas traducións en {{SITENAME}}. Para cancelar a subscrición ou cambiar as súas preferencias de notificación sobre as traducións, visite $8.',
	'translationnotifications-talkpage-body' => 'Boas, $2:

Recibiu esta notificación porque está {{GENDER:$1|inscrito|inscrita}} como {{GENDER:$1|tradutor|tradutora}} {{PLURAL:$9|ao}} $3 en {{SITENAME}}.
A páxina "[[$4]]" está dispoñible para a súa tradución. Pode traducila aquí:
$5

$6
$7

$8

Agradecemos enormemente a súa axuda. Os tradutores coma vostede fan que {{SITENAME}} funcione
como unha gran comunidade multilingüe.

Grazas!

Os coordinadores das traducións de {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'traducir ao $1',
	'translationnotifications-digestemail-subject' => 'Correo electrónico de resumo sobre as solicitudes de tradución de {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Boas, $1:

Recibiu este correo electrónico porque está {{GENDER:$1|inscrito|inscrita}} como {{GENDER:$1|tradutor|tradutora}} ao $2 en {{SITENAME}}.

Hai {{PLURAL:$3|1 nova páxina|$3 novas páxinas}} que traducir alí. A continuación están os detalles.

$4

Agradecemos enormemente a súa axuda. Os tradutores coma vostede fan que {{SITENAME}} funcione
como unha gran comunidade multilingüe.

Grazas!
Os coordinadores das traducións de {{SITENAME}}

----

Recibiu este correo electrónico porque se inscribiu para recibir correos electrónicos relacionados coas traducións en {{SITENAME}}. Para cancelar a subscrición ou cambiar as súas preferencias de notificación sobre as traducións, visite <$5>.',
	'translationnotifications-digestemail-notification-line' => 'O $1, $2 marcou "$3" para a súa tradución. Pode traducila en $4',
	'translationnotifications-edit-summary' => 'Notificación de tradución: $1',
	'translationnotifications-email-priority' => 'A prioridade desta páxina é $1.',
	'translationnotifications-email-deadline' => 'A data límite para traducir a páxina é $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|enviou}} correctamente unha notificación sobre a tradución da páxina "$3"; {{PLURAL:$10|lingua|linguas}}: $4; data límite: $5; prioridade: $6; {{PLURAL:$7|recibiuna 1 destinatario|recibírona $7 destinatarios}}; {{PLURAL:$8|1 destinatario non a recibiu|$8 destinatarios non a recibiron}}; {{PLURAL:$9|omitiuse 1 destinatario|omitíronse $9 destinatarios}}',
	'log-name-notifytranslators' => 'Notificacións de tradución',
	'log-description-notifytranslators' => 'Un rexistro das notificacións enviadas aos tradutores sobre a tradución de páxinas',
	'translationnotifications-sent-title' => 'Notificación de tradución enviada',
	'translationnotifications-sent-body' => 'Enviouse a notificación de tradución.',
	'translationnotifications-log-alllanguages' => 'todas as linguas',
	'translationnotifications-nodeadline' => 'ningunha',
	'translationnotifications-signup-legal' => 'Acepta que ao proporcionar esta información podemos poñernos en contacto con vostede por temas relacionados con {{SITENAME}} que pensemos que poidan ser do seu interese. Acepta que os seus datos están suxeitos á nosa [[{{MediaWiki:Privacypage}}|política de protección de datos]].',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'translatorsignup' => 'רישום מתרגמים',
	'translatorsignup-summary' => 'בדף הזה אפשר לציין לאילו שפות ביכולתך לתרגם ואיך ליצור אתך קשר עם בקשות תרגום חדשות.',
	'translationnotifications-desc' => 'רישום מתרגמים לעדכונים על מיזמי תרגום',
	'translationnotifications-info' => 'מידע על המשתמש',
	'translationnotifications-username' => 'שם משתמש:',
	'translationnotifications-emailstatus' => 'מצב דוא"ל:',
	'translationnotifications-email-confirmed' => 'הדוא"ל שלך מאומת',
	'translationnotifications-email-disablemail' => 'כתובת הדואר האלקטרוני שלך מאושרת, אבל ב[[Special:Preferences|העדפות שלך]] ביקשת לא לקבל דואר אלקטרוני.',
	'translationnotifications-email-unconfirmed' => 'הדוא"ל שלך אינו מאומת. $1',
	'translationnotifications-email-notset' => 'לא נתת כתובת דוא"ל. אפשר לעשות את זה ב[[Special:Preferences|העדפות]] שלך.',
	'translationnotifications-languages' => 'שפות',
	'translationnotifications-lang' => "שפה מס' $1",
	'translationnotifications-nolang' => 'בחירת שפה',
	'translationnotifications-contact' => 'דרכי התקשרות מועדפות',
	'translationnotifications-cmethod-email' => 'דוא"ל',
	'translationnotifications-cmethod-talkpage' => 'דף שיחה',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'דף שיחה בוויקי אחר',
	'translationnotifications-cmethod-feed' => 'הזנה',
	'translationnotifications-frequency' => 'תדירות ההתקשרות',
	'translationnotifications-freq-always' => 'כשיש מה לתרגם',
	'translationnotifications-freq-week' => 'לכל היותר פעם בשבוע',
	'translationnotifications-freq-month' => 'לכל היותר פעם בחודש',
	'translationnotifications-freq-weekly' => 'סיכום שבועי',
	'translationnotifications-freq-monthly' => 'סיכום חודשי',
	'translationnotifications-submit' => 'עדכון הגדרות',
	'translationnotifications-signup-success' => 'ההעדפות ההודעות על תרגום שלך נשמרו.',
	'notifytranslators' => 'מכתבים למתרגמים',
	'translationnotifications-submit-ok' => 'ההודעות נוספו לתור המשימות ויישלחו על־ידי משימת רקע.',
	'translationnotifications-send-notification-button' => 'שליחת מכתבים למתרגמים',
	'translationnotifications-deadline-label' => 'תאריך סופי שיתווסף להודעה:',
	'translationnotifications-languages-to-notify-label' => 'רשימת שפות שהמתרגמים אליהן יקבלו את ההודעה:',
	'translationnotifications-languages-to-notify-label-help-message' => 'רשימה מופרדת בפסיקים של קודי שפה; אם השדה יהיה ריק, ההודעה תישלח לדוברי כל השפות.',
	'translationnotifications-priority' => 'עדיפות:',
	'translationnotifications-priority-high' => 'גבוהה',
	'translationnotifications-priority-medium' => 'בינונית',
	'translationnotifications-priority-low' => 'נמוכה',
	'translationnotifications-priority-unset' => '(בלתי־מוגדרת)',
	'translationnotifications-translatablepage-title' => 'שם הדף לתרגום:',
	'translationnotifications-error-no-translatable-pages' => 'אין דפים לתרגום בוויקי הזה.',
	'translationnotifications-email-subject' => 'נא לתרגם את הדף $1',
	'translationnotifications-email-body' => 'שלום $1,

קיבלת את המכתב הזה כי נרשמת בתור {{GENDER:$10|מתרגם|מתרגמת}} {{PLURAL:$9|ל}}$2 באתר {{SITENAME}}.

יש שם דף חדש שצריך לתרגם: $3.
אפשר לתרגם אותו על־ידי לחיצה על הקישור הבא:
$4

$5
$6

$7

אנחנו מעריכים מאוד את עזרתך. מתרגמים כמוך עוזרים לאתר {{SITENAME}} לתפקד
כקהילה רב־לשונית אמתית.

תודה!
רכזי תרגום באתר {{SITENAME}}

----

קיבלת את המכתב הזה כי נרשמת לקבלת מכתבים בנושא תרגומים באתר {{SITENAME}}. כדי לבטל את המינוי או לשנות את הגדרות שלך על ההודעות בנושא תרגומים, נא לבקר בדף הבא:
$8',
	'translationnotifications-talkpage-body' => 'שלום $2,

קיבלת את ההודעה הזאת מכיוון שנרשמת בתור {{GENDER:$1|מתרגם|מתרגמת}} {{PLURAL:$9|ל}}{{GRAMMAR:תחילית|$3}} באתר {{SITENAME}}.
דף חדש בשם [[$4]] זמין לתרגום. אנו מבקשים ממך לתרגם אותו בקישור הבא:
$5

$6
$7

$8

אנחנו מעריכים מאוד את עזרתך. מתרגמים כמוך עוזרים לאתר {{SITENAME}} לתפקד
כמו קהילה רב־לשונית אמתית.

תודה!

רכזי תרגום באתר {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'תרגום ל{{GRAMMAR:תחילית|$1}}',
	'translationnotifications-digestemail-subject' => 'מכתב עם סיכום בקשות תרגום מאתר {{SITENAME}}',
	'translationnotifications-digestemail-body' => "שלום $1,

קיבלת את ההודעה הזאת מכיוון שנרשמת בתור {{GENDER:$1|מתרגם|מתרגמת}} {{PLURAL:$3|ל}}{{GRAMMAR:תחילית|$2}} באתר {{SITENAME}}.
{{PLURAL:$3|דף אחד חדש זמין|יש $3 דפים חדשים שזמינים}} לתרגום. ר' את הפרטים להלן.

$4

אנחנו מעריכים מאוד את עזרתך. מתרגמים כמוך עוזרים לאתר {{SITENAME}} לתפקד
כמו קהילה רב־לשונית אמתית.

תודה!

מנהלי התרגום באתר {{SITENAME}}

----

קיבלת את המכתב הזה כי נרשמת לקבלת מכתבים בנושא תרגומים באתר {{SITENAME}}. כדי לבטל את המינוי או לשנות את הגדרות שלך על ההודעות בנושא תרגומים, נא לבקר בדף <$5> .",
	'translationnotifications-digestemail-notification-line' => 'ב־$1, המשתמש $2 סימן את הדף "$3" לתרגום. אפשר לתרגם אותו בקישור $4',
	'translationnotifications-edit-summary' => 'הודעה על תרגום: $1',
	'translationnotifications-email-priority' => 'העדיפות של הדף הזה: $1.',
	'translationnotifications-email-deadline' => 'התאריך הסופי לתרגום הדף הזה הוא $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|שלח|שלחה}} מכתב עם בקשה לתרגם את הדף $3; {{PLURAL:$1|שפה|שפות}}: $4; תאריך סופי: $5; עדיפות: $6; השליחה הצליחה ל{{PLURAL:$7|מקבל אחד|־$7 מקבלים}}, נכשלה {{PLURAL:$8|למקבל אחד|ל־$8 מקבלים}}, ודילגה על {{PLURAL:$9|מקבל אחד|$9 מקבלים}}',
	'log-name-notifytranslators' => 'מכתבים למתרגמים',
	'log-description-notifytranslators' => 'יומן של מכתבים שנשלחים למתרגמים על דפים שאפשר לתרגם',
	'translationnotifications-sent-title' => 'נשלח מכתב למתרגמים',
	'translationnotifications-sent-body' => 'נשלח מכתב למתרגמים.',
	'translationnotifications-log-alllanguages' => 'כל השפות',
	'translationnotifications-nodeadline' => 'אין',
	'translationnotifications-signup-legal' => 'מתן המידע הזה מהווה את הסכמתך לכך שניצור אתך קשר בנושאים שקשורים לאתר {{SITENAME}} ושנראה לנו שיעניינו אותך. הנתונים שלך כפופים ל[[{{MediaWiki:Privacypage}}|מדיניות הפרטיות]] שלנו.',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'translatorsignup' => 'Registrowanje přełožowarja',
	'translatorsignup-summary' => 'Wužij tutu stronu, zo by podał, do kotrychž rěčow móžeš přełožić a kak chceš so wo nowych požadanych přełožkach informować.',
	'translationnotifications-desc' => 'Zmóžnja registrowanje přełožowarjow za přełožowanske zdźělenja',
	'translationnotifications-info' => 'Wužiwarske informacije',
	'translationnotifications-username' => 'Wužiwarske mjeno:',
	'translationnotifications-emailstatus' => 'E-mejlowy status:',
	'translationnotifications-email-confirmed' => 'Twoja e-mejlowa adresa je so wobkrućiła',
	'translationnotifications-email-disablemail' => 'Twoja e-mejlowa adresa je so wobkrućiła, ale přez [[Special:Preferences|twoje nastajenja]] sy postajił, zo nochceš žanu e-mejl přijimać.',
	'translationnotifications-email-unconfirmed' => 'Twoja e-mejlowa adresa njeje so wobkrućiła. $1',
	'translationnotifications-email-notset' => 'Njejsy e-mejlowu adresu podał. Móžeš to w swojich [[Special:Preferences|nastajenjach]] činić.',
	'translationnotifications-languages' => 'Rěče',
	'translationnotifications-lang' => 'Rěč čo. $1',
	'translationnotifications-nolang' => 'Rěč wubrać',
	'translationnotifications-contact' => 'Preferowane kontaktowanske metody',
	'translationnotifications-cmethod-email' => 'E-mejl:',
	'translationnotifications-cmethod-talkpage' => 'Diskusijna strona',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskusijna strona na druhim wikiju',
	'translationnotifications-cmethod-feed' => 'Kanal',
	'translationnotifications-frequency' => 'Kontaktowa častosć',
	'translationnotifications-freq-always' => 'Přeco, hdyž je něšto nowe za přełožowanje',
	'translationnotifications-freq-week' => 'Maksimalnje jónu na tydźeń',
	'translationnotifications-freq-month' => 'Maksimalnje jónu na měsac',
	'translationnotifications-freq-weekly' => 'Tydźenska rozprawa',
	'translationnotifications-freq-monthly' => 'Měsačna rozprawa',
	'translationnotifications-submit' => 'Nastajenja aktualizować',
	'translationnotifications-signup-success' => 'Nastajenja twojich přełožowanskich zdźělenkow su so składowali.',
	'notifytranslators' => 'Přełožowarjow informować',
	'translationnotifications-submit-ok' => 'Źdźělenki su so čakanskemu rynčkej přidali a dodawaja so přez proces w pozadku.',
	'translationnotifications-send-notification-button' => 'Přełožowarjam zdźělenku pósłać',
	'translationnotifications-deadline-label' => 'Termin, kotryž dyrbi so w tutej zdźělence podać:',
	'translationnotifications-languages-to-notify-label' => 'Rěče, kotrež maja so informować:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Rěčne kody dźělene přez komu; prózdne wostajić, zo by wšě rěče informowało.',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'wysoka',
	'translationnotifications-priority-medium' => 'srjedźna',
	'translationnotifications-priority-low' => 'niska',
	'translationnotifications-priority-unset' => '(njenastajena)',
	'translationnotifications-translatablepage-title' => 'Mjeno přełožujomneje strony:',
	'translationnotifications-error-no-translatable-pages' => 'W tutym wikiju žane přełožujomne strony njejsu.',
	'translationnotifications-email-subject' => 'Prošu přełož stronu $1',
	'translationnotifications-email-body' => 'Witaj $1,

Dóstawaš tutu e-mejl, dokelž sy so jako přełožowar {{PLURAL:$9|za}} $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrował.

Je nowa strona, kotraž dyrbi so přełožować: $3.
Móžeš ju přełožować, kliknjo na slědowacy wotkaz:
$4

$5
$6

$7

Twoja pomoc je jara witana. Přełožowarjo kaž ty pomhaja, zo by {{SITENAME}} kaž woprawdźe wjacerěcny zhromadźenstwo fungował.

Wulki dźak!

Přełožowanscy koordinatorojo {{GRAMMAR:genitiw|{{SITENAME}}}}

----

Přijimaš tutu e-mejl, dokelž sy so za přijeće e-mejlow wo přełožkach na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrował. Zo by přijeće e-mejlow wotskazał abo swoje zdźělenske nastajenja změnił, dźi prošu k $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Witaj $2,

dostawaš tutu zdźělenku, dokelž sy so jako přełožowar za $3 na {{SITENAME}} zregistrował.
Strona [[$4]] steji za přełožowanje k dispoziciji. Móžeš ju tu přełožić:
$5

$6
$7

$8

Waša pomoc je jara witana. Přełožowarjo kaž ty pomhaja, zo by {{SITENAME}} kaž woprawdźe wjacerěčne zhromadźenstwo fungowało.  

Wulki dźak!

Přełožowanscy koordinatorojo {{GRAMMAR:genitiw|{{SITENAME}}}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'do $1 přełožić',
	'translationnotifications-digestemail-subject' => 'E-mejlowy přehlad za požadane přełožki wot {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'translationnotifications-digestemail-body' => 'Witaj $1,

dostawaš tutu e-mejl, dokelž sy so jako přełožowar za $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrował.
{{PLURAL:$3|Je 1 strona|Stej $3 stronje|Su $3 strony|Je $3 stronow}} za přełožowanje k dispoziciji.  Podrobnosće namakaš deleka.

$4

Twoja pomoc je jara witana. Přełožowarjo kaž ty pomhaja, zo by {{SITENAME}} kaž woprawdźe wjacerěcny zhromadźenstwo fungował.

Wulki dźak!
{{SITENAME}} - přełožowanscy  administratorjo

----

Přijimaš tutu e-mejl, dokelž sy so za přijeće e-mejlow wo přełožkach na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrował. Zo by přijeće e-mejlow wotskazał abo swoje zdźělenske nastajenja změnił, dźi prošu k <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Dnja $1 je $2 stronu "$3" za přełožowanje woznamjenił. Móžeš ju na $4 přełožować.',
	'translationnotifications-edit-summary' => 'Přełožowanska zdźělenka: $1',
	'translationnotifications-email-priority' => 'Priorita tuteje strony je $1.',
	'translationnotifications-email-deadline' => 'Termin za přełožowanje tuteje strony je $1.',
	'logentry-translationnotifications-sent' => '$1 je zdźělenku wo přełožowanskej stronje $3 {{GENDER:$2|pósłał|posłała}}; rěče: $4; termin $5; priorita $6; je ju na {{PLURAL:$7|jednoho přijimarja|$7 přijimarjow|$7 přijimarjow|$7 prijimarjow}}  {{GENDER:$2|pósłał|pósłała}}, je so njeporadźiła za {{PLURAL:$8|jednoho přijimarja|$8 přijimarjow|$8 přijimarjow|$8 přijimarjow}}, je so přeskočiła za  {{PLURAL:$9|jednoho přijimarja|$9 přijimarjow|$9 přijimarjow|$9 přijimarjow}}.', # Fuzzy
	'log-name-notifytranslators' => 'Přełožowanske zdźělenki',
	'log-description-notifytranslators' => 'Protokol wo zdźělenkach, kotrež su so přełožowarjam wo přełožujomnych stronach pósłali',
	'translationnotifications-sent-title' => 'Přełožowanska zdźělenka je so pósłała',
	'translationnotifications-sent-body' => 'Přełožowanska zdźělenka je so pósłała.',
	'translationnotifications-log-alllanguages' => 'wšě rěče',
	'translationnotifications-nodeadline' => 'žadyn',
	'translationnotifications-signup-legal' => 'Přez podawanje tutych informacijow přizwoliš, zo móžemy so z tobu nastupajo temy w zwisku {{GRAMMAR:instrumental|{{SITENAME}}}} do zwiska stajić, kotrež móhli će zajimować. Zwoliš do toho, zo waše daty našim [[{{MediaWiki:Privacypage}}|prawidłam priwatnosće]] podleža.',
);

/** Hungarian (magyar)
 * @author Dj
 */
$messages['hu'] = array(
	'translationnotifications-info' => 'Felhasználói adatok',
	'translationnotifications-username' => 'Felhasználónév:',
	'translationnotifications-emailstatus' => 'Email állapot:',
	'translationnotifications-email-confirmed' => 'Az email címed megerősített',
	'translationnotifications-email-disablemail' => 'Az email címed megerősített, de a [[Special:Preferences|beállításoknál]] nem kértél email értesítést.',
	'translationnotifications-email-unconfirmed' => 'Az email címed nem megerősített. $1',
	'translationnotifications-priority' => 'Prioritás:',
	'translationnotifications-priority-high' => 'magas',
	'translationnotifications-priority-medium' => 'közepes',
	'translationnotifications-priority-low' => 'alacsony',
	'translationnotifications-priority-unset' => '(nem beállított)',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'translatorsignup' => 'Inscription de traductor',
	'translatorsignup-summary' => 'Iste pagina es pro indicar le linguas in le quales tu sape traducer, e le methodo preferite de contacto sur nove requestas de traduction.',
	'translationnotifications-desc' => 'Permitte que traductores se inscribe pro notificationes concernente le traduction',
	'translationnotifications-info' => 'Information de usator',
	'translationnotifications-username' => 'Nomine de usator:',
	'translationnotifications-emailstatus' => 'Stato de e-mail:',
	'translationnotifications-email-confirmed' => 'Tu adresse de e-mail es confirmate',
	'translationnotifications-email-disablemail' => 'Tu adresse de e-mail es confirmate, ma in [[Special:Preferences|tu preferentias]] tu ha optate pro non reciper e-mail.',
	'translationnotifications-email-unconfirmed' => 'Tu adresse de e-mail non es confirmate. $1',
	'translationnotifications-email-notset' => 'Tu non ha fornite un adresse de e-mail. Tu pote facer isto in le [[Special:Preferences|preferentias]].',
	'translationnotifications-languages' => 'Linguas',
	'translationnotifications-lang' => 'Lingua №$1',
	'translationnotifications-nolang' => 'Selige un lingua',
	'translationnotifications-contact' => 'Methodos preferite de contacto',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Pagina de discussion',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pagina de discussion in un altere wiki',
	'translationnotifications-cmethod-feed' => 'Syndication',
	'translationnotifications-frequency' => 'Frequentia de contacto',
	'translationnotifications-freq-always' => 'Quando il ha qualcosa de nove a traducer',
	'translationnotifications-freq-week' => 'Al plus un vice per septimana',
	'translationnotifications-freq-month' => 'Al plus un vice per mense',
	'translationnotifications-freq-weekly' => 'Digesto septimanal',
	'translationnotifications-freq-monthly' => 'Digesto mensual',
	'translationnotifications-submit' => 'Actualisar configurationes',
	'translationnotifications-signup-success' => 'Tu preferentias concernente le notification de traductiones ha essite confirmate.',
	'notifytranslators' => 'Notificar traductores',
	'translationnotifications-submit-ok' => 'Notificationes ha essite addite a un cauda e es livrate per un processo in secunde plano.',
	'translationnotifications-send-notification-button' => 'Inviar un notification a traductores',
	'translationnotifications-deadline-label' => 'Data limite a indicar in iste notification:',
	'translationnotifications-languages-to-notify-label' => 'Le linguas a notificar:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Codices de lingua separate per commas; lassa vacue pro facer notification pro tote le linguas.',
	'translationnotifications-priority' => 'Prioritate:',
	'translationnotifications-priority-high' => 'alte',
	'translationnotifications-priority-medium' => 'medie',
	'translationnotifications-priority-low' => 'basse',
	'translationnotifications-priority-unset' => '(non definite)',
	'translationnotifications-translatablepage-title' => 'Nomine de pagina traducibile:',
	'translationnotifications-error-no-translatable-pages' => 'Il non ha paginas traducibile in iste wiki.',
	'translationnotifications-email-subject' => 'Per favor traduce le pagina $1',
	'translationnotifications-email-body' => 'Salute $1,

Tu recipe iste message perque tu es inscribite como traductor in $2 in {{SITENAME}}.

Il ha un nove pagina a traducer: $3.
Per favor traduce lo a partir del sequente ligamine:
$4

$5
$6

$7

Gratias!
Le administratores de traduction de {{SITENAME}}

----

Tu ha recipite iste message perque tu te ha inscribite pro reciper e-mail sur traductiones in {{SITENAME}}. Pro cancellar le subscription o pro cambiar le preferentias de notification pro traductiones, per favor visita $8', # Fuzzy
	'translationnotifications-talkpage-body' => 'Salute $2,

Tu recipe iste notification perque tu te inscribeva como traductor de $3 in {{SITENAME}}.
Un nove pagina, [[$4]] es disponibile pro traduction. Per favor traduce lo:
$5

$6
$7

$8

Gratias!

Le administratores de traduction de {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'traducer in $1',
	'translationnotifications-digestemail-subject' => 'Digesto in e-mail con requestas de traduction ab {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Salute $1,

Tu recipe iste e-mail perque tu te inscribeva qua traductor de $2 in {{SITENAME}}.

Il ha {{PLURAL:$3|1 pagina|$3 paginas}} disponibile pro traduction. Ecce le detalios:

$4

Gratias!
Le administratores de traduction de {{SITENAME}}

----

Tu ha recipite iste message perque tu te ha inscribite pro reciper e-mail sur traductiones in {{SITENAME}}. Pro cancellar le subscription o pro cambiar le preferentias de notification pro traductiones, per favor visita <$5>', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Le $1, $2 marcava "$3" pro traduction. Tu pote traducer lo a $4',
	'translationnotifications-edit-summary' => 'Notification de traduction: $1',
	'translationnotifications-email-priority' => 'Le prioritate de iste pagina es $1.',
	'translationnotifications-email-deadline' => 'Le data limite pro traducer iste pagina es $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|inviava}} un notification sur le traduction del pagina $3; linguas: $4; data limite: $5; prioritate: $6; inviate a {{PLURAL:$7|un destinatario|$7 destinatarios}}, invio fallite pro {{PLURAL:$8|un destinatario|$8 destinatarios}}, non inviate a {{PLURAL:$9|un destinatario|$9 destinatarios}}', # Fuzzy
	'log-name-notifytranslators' => 'Notificationes de traduction',
	'log-description-notifytranslators' => 'Un registro de notificationes inviate a traductores sur paginas traducibile',
	'translationnotifications-sent-title' => 'Notification de traduction inviate',
	'translationnotifications-sent-body' => 'Le notification de traduction ha essite inviate.',
	'translationnotifications-log-alllanguages' => 'tote le linguas',
	'translationnotifications-nodeadline' => 'nulle',
	'translationnotifications-signup-legal' => 'Per fornir iste information tu accepta que nos pote contactar te concernente themas associate a {{SITENAME}} le quales nos pensa que pote esser de interesse a te. Tu accepta que tu datos es subjecte a nostre [[{{MediaWiki:Privacypage}}|politica de confidentialitate]].',
);

/** Indonesian (Bahasa Indonesia)
 * @author පසිඳු කාවින්ද
 */
$messages['id'] = array(
	'translationnotifications-cmethod-email' => 'Surel',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author Ximo17
 */
$messages['it'] = array(
	'translatorsignup' => 'Iscrizione traduttore',
	'translatorsignup-summary' => 'Utilizza questa pagina per indicare in quali lingue puoi tradurre, e come preferisci essere contrattato per le richieste di traduzione.',
	'translationnotifications-desc' => 'Permette ai traduttori di ricevere le notifiche sulle traduzioni',
	'translationnotifications-info' => "Informazioni sull'utente",
	'translationnotifications-username' => 'Nome utente:',
	'translationnotifications-emailstatus' => 'Stato email:',
	'translationnotifications-email-confirmed' => 'Il tuo indirizzo di posta elettronica è stato confermato.',
	'translationnotifications-email-disablemail' => 'Il tuo indirizzo di posta elettronica è stato confermato, ma nelle [[Special:Preferences|tue preferenze]] hai chiesto di non ricevere email.',
	'translationnotifications-email-unconfirmed' => 'Il tuo indirizzo di posta elettronica non è stato confermato. $1',
	'translationnotifications-email-notset' => 'Non hai fornito un indirizzo di posta elettronica. Puoi impostarlo nelle [[Special:Preferences|tue preferenze]].',
	'translationnotifications-languages' => 'Lingue',
	'translationnotifications-lang' => 'Lingua #$1',
	'translationnotifications-nolang' => 'Scegli una lingua',
	'translationnotifications-contact' => 'Modalità di contatto preferite',
	'translationnotifications-cmethod-email' => 'Email',
	'translationnotifications-cmethod-talkpage' => 'Pagina di discussione',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pagina di discussione su altra wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Frequenza di contatto',
	'translationnotifications-freq-always' => "Quando c'è qualcosa di nuovo da tradurre",
	'translationnotifications-freq-week' => 'Al massimo una volta a settimana',
	'translationnotifications-freq-month' => 'Al massimo una volta al mese',
	'translationnotifications-freq-weekly' => 'Riepilogo settimanale',
	'translationnotifications-freq-monthly' => 'Riepilogo mensile',
	'translationnotifications-submit' => 'Aggiorna impostazioni',
	'translationnotifications-signup-success' => 'Le preferenze per le notifiche sulle traduzioni sono state salvate.',
	'notifytranslators' => 'Informa i traduttori',
	'translationnotifications-submit-ok' => 'Le notifiche sono state aggiunte a una coda e vengono consegnate da un processo in background.',
	'translationnotifications-send-notification-button' => 'Invia una notifica ai traduttori',
	'translationnotifications-deadline-label' => 'Termine da indicare in questa notifica:',
	'translationnotifications-languages-to-notify-label' => 'Quali lingue notificare:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Codici di lingua separati da virgole; lasciare vuoto per notificare in tutte le lingue.',
	'translationnotifications-priority' => 'Priorità:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'media',
	'translationnotifications-priority-low' => 'bassa',
	'translationnotifications-priority-unset' => 'non impostata',
	'translationnotifications-translatablepage-title' => 'Nome della pagina traducibile:',
	'translationnotifications-error-no-translatable-pages' => 'Non ci sono pagine traducibili in questo wiki.',
	'translationnotifications-email-subject' => 'Si prega di tradurre la pagina $1',
	'translationnotifications-email-body' => "Ciao $1,

Ricevi questa email perché ti sei {{GENDER:$10|registrato come traduttore|registrata come traduttrice|registrato/a come traduttore/trice}} {{PLURAL:$9|in}} $2 su {{SITENAME}}.

C'è una pagina da tradurre: $3.
Clicca su questo collegamento per iniziare a tradurla:
$4

$5
$6

$7

Il tuo aiuto è molto apprezzato. I traduttori come te aiutano {{SITENAME}} a essere una reale comunità multilingua.

Grazie!
I coordinatori delle traduzioni di {{SITENAME}}

----
Hai ricevuto questa email perché ti sei registrato per ricevere messaggi di posta elettronica relativi alle traduzioni su {{SITENAME}}. Per annullare l'iscrizione o modificare le preferenze di notifica per le traduzioni, visita $8.",
	'translationnotifications-talkpage-body' => 'Ciao $2,

Ricevi questa email perché ti sei {{GENDER:$10|registrato come traduttore|registrata come traduttrice|registrato/a come traduttore/trice}} {{PLURAL:$9|$3}} su {{SITENAME}}.
La pagina [[$4]] è disponibile per la traduzione. Visita questo collegamento per iniziare a tradurla:
$5

$6
$7

$8

Il tuo aiuto è molto apprezzato. I traduttori come te aiutano {{SITENAME}} a essere una reale comunità multilingua.

Grazie!
I coordinatori delle traduzioni su {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'traduci in $1',
	'translationnotifications-digestemail-subject' => 'Email selezionate per le richieste di traduzione da parte del sito {{SITENAME}}',
	'translationnotifications-digestemail-body' => "Ciao $1,

Ricevi questa email perché ti sei {{GENDER:$10|registrato come traduttore|registrata come traduttrice|registrato/a come traduttore/trice}} $2 su {{SITENAME}}.

{{PLURAL:$3|C'è 1 pagina disponibile|Ci sono $3 pagine disponibili}} per la traduzione. I dettagli sono riportati di seguito.

$4

Il tuo aiuto è molto apprezzato. I traduttori come te aiutano {{SITENAME}} a essere una reale comunità multilingua.

Grazie!
Gli amministratori delle traduzioni di {{SITENAME}}

----
Hai ricevuto questa email perché ti sei registrato per ricevere messaggi di posta elettronica relativi alle traduzioni su {{SITENAME}}. Per annullare l'iscrizione o modificare le preferenze di notifica per le traduzioni, visita <$5>.",
	'translationnotifications-digestemail-notification-line' => 'Il $1, $2 ha segnalato la pagina "$3" affinché venga tradotta. Puoi tradurla su $4',
	'translationnotifications-edit-summary' => 'Notifica di traduzione: $1',
	'translationnotifications-email-priority' => 'La priorità di questa pagina è $1.',
	'translationnotifications-email-deadline' => 'Il termine ultimo per la traduzione di questa pagina è $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|ha inviato}} una notifica sulla traduzione della pagina $3; {{PLURAL:$1|lingua|lingue}}: $4; termine: $5; priorità: $6; inviata a {{PLURAL:$7|un destinatario|$7 destinatari}}, non inviata a {{PLURAL:$8|un destinatario|$8 destinatari}}, omessa a {{PLURAL:$9|un destinatario|$9 destinatari}}',
	'log-name-notifytranslators' => 'Notifiche di traduzione',
	'log-description-notifytranslators' => 'Una serie di notifiche riguardanti le pagine traducibili sono state inviate ai traduttori.',
	'translationnotifications-sent-title' => 'Notifica di traduzione inviata',
	'translationnotifications-sent-body' => 'La notifica di traduzione è stata inviata.',
	'translationnotifications-log-alllanguages' => 'tutte le lingue',
	'translationnotifications-nodeadline' => 'nessuno',
	'translationnotifications-signup-legal' => 'Accetti che, fornendo queste informazioni, possiamo contattarti per quanto riguarda argomenti relativi a {{SITENAME}} che pensiamo possano interessarti. Accetti che i tuoi dati siano soggetti alla nostra [[{{MediaWiki:Privacypage}}|politica sulla privacy]].',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'translatorsignup' => '翻訳者登録',
	'translatorsignup-summary' => 'このページでは、あなたがどの言語に翻訳できるかを伝えることができ、新しい翻訳依頼を受け取る手段を指定できます。',
	'translationnotifications-desc' => '翻訳者が登録して翻訳の通知を受信できるようにする',
	'translationnotifications-info' => '利用者情報',
	'translationnotifications-username' => '利用者名:',
	'translationnotifications-emailstatus' => 'メールアドレスの状態:',
	'translationnotifications-email-confirmed' => 'メールアドレスは検証済みです',
	'translationnotifications-email-disablemail' => 'メールアドレスは検証済みですが、[[Special:Preferences|個人設定]]でメールを受け取る設定にしていません。',
	'translationnotifications-email-unconfirmed' => 'メールアドレスは未検証です。$1',
	'translationnotifications-email-notset' => 'あなたはメールアドレスを設定していません。[[Special:Preferences|個人設定]]で設定できます。',
	'translationnotifications-languages' => '言語',
	'translationnotifications-lang' => '言語 #$1',
	'translationnotifications-nolang' => '言語を選択',
	'translationnotifications-contact' => '希望する連絡手段',
	'translationnotifications-cmethod-email' => 'メール',
	'translationnotifications-cmethod-talkpage' => 'トークページ',
	'translationnotifications-cmethod-talkpage-elsewhere' => '他のウィキのトークページ',
	'translationnotifications-cmethod-feed' => 'フィード',
	'translationnotifications-frequency' => '連絡の頻度',
	'translationnotifications-freq-always' => '翻訳対象が新たに追加されるたびに',
	'translationnotifications-freq-week' => '週 1 通まで',
	'translationnotifications-freq-month' => '月 1 通まで',
	'translationnotifications-submit' => '設定を更新',
	'translationnotifications-signup-success' => '翻訳の通知の設定を保存しました。',
	'notifytranslators' => '翻訳者に通知',
	'translationnotifications-submit-ok' => '通知をキューに追加しました。通知はバックグラウンドジョブによって送信されます。',
	'translationnotifications-send-notification-button' => '翻訳者に通知を送信',
	'translationnotifications-deadline-label' => 'この通知で指定する締め切り:',
	'translationnotifications-languages-to-notify-label' => '通知する言語:',
	'translationnotifications-languages-to-notify-label-help-message' => 'カンマ区切りの言語コードです。すべての言語を通知する場合は空欄にします。',
	'translationnotifications-priority' => '優先度:',
	'translationnotifications-priority-high' => '高',
	'translationnotifications-priority-medium' => '中',
	'translationnotifications-priority-low' => '低',
	'translationnotifications-priority-unset' => '(未設定)',
	'translationnotifications-translatablepage-title' => '翻訳対象のページ名:',
	'translationnotifications-error-no-translatable-pages' => 'このウィキには翻訳対象ページはありません。',
	'translationnotifications-email-subject' => 'ページ $1 を翻訳してください',
	'translationnotifications-notification-url-listitem' => '$1に翻訳',
	'translationnotifications-digestemail-subject' => '{{SITENAME}}からの翻訳要請ダイジェストメール',
	'translationnotifications-edit-summary' => '翻訳の通知: $1',
	'translationnotifications-email-priority' => 'このページの優先度は$1です。',
	'translationnotifications-email-deadline' => 'このページの翻訳の締め切りは $1 です。',
	'logentry-translationnotifications-sent' => '$1 がページ $3 の翻訳について通知を{{GENDER:$2|送信しました}}。{{PLURAL:$10|言語}}: $4、締め切り: $5、優先度: $6。送信成功 {{PLURAL:$7|$7 人}}、失敗 {{PLURAL:$8|$8 人}}、スキップ {{PLURAL:$9|$9 人}}',
	'log-name-notifytranslators' => '翻訳の通知',
	'log-description-notifytranslators' => '翻訳対象ページについて翻訳者宛に送信した通知の記録',
	'translationnotifications-sent-title' => '翻訳の通知を送信しました',
	'translationnotifications-sent-body' => '翻訳の通知を送信しました。',
	'translationnotifications-log-alllanguages' => 'すべての言語',
	'translationnotifications-nodeadline' => 'なし',
);

/** Javanese (Basa Jawa)
 * @author NoiX180
 */
$messages['jv'] = array(
	'translatorsignup' => 'Pandaptaran penerjemah',
	'translatorsignup-summary' => 'Anggo kaca iki kanggo nemtokaké basa sing Sampéyan bisa terjemahaké, lan piyé Sampéyan bisa dihubungi ngenani panjalukan terjemahan anyar.',
	'translationnotifications-desc' => 'Lilakaké panerjemah ndaptar kanggo wara-wara terjemahan',
	'translationnotifications-info' => 'Informasi panganggo',
	'translationnotifications-username' => 'Jeneng panganggo:',
	'translationnotifications-emailstatus' => 'Status layang èlèktronik:',
	'translationnotifications-email-confirmed' => 'Alamat layang èlèktronik Sampéyan wis dipesthèkaké',
	'translationnotifications-email-disablemail' => 'Alamat layang èlèktronik Sampéyan wis dipesthèkaké, nanging [[Special:Preferences|prèferènsi Sampéyan]] ora njaluk nampa layang èlèktronik.',
	'translationnotifications-email-unconfirmed' => 'Alamat layang èlèktronik Sampéyan durung dipesthèkaké. $1',
	'translationnotifications-email-notset' => 'Sampéyan durung ngisi alamat layang èlèktronik. Sampéyan bisa ngisi kuwi nèng [[Special:Preferences|prèferènsi]] Sampéyan.',
	'translationnotifications-languages' => 'Basa',
	'translationnotifications-lang' => 'Basa $1',
	'translationnotifications-nolang' => 'Pilih basa',
	'translationnotifications-contact' => 'Metodé kontak sing disaranaké',
	'translationnotifications-cmethod-email' => 'Layang èlèktronik',
	'translationnotifications-cmethod-talkpage' => 'Kaca guneman',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Kaca guneman nèng wiki liya',
	'translationnotifications-cmethod-feed' => 'Lebon saran',
	'translationnotifications-frequency' => 'Frékuènsi kontak',
	'translationnotifications-freq-always' => 'Nalika ana sing anyar kanggo diterjemahaké',
	'translationnotifications-freq-week' => 'Paling kerep seminggu pisan',
	'translationnotifications-freq-month' => 'Paling kerep sesasi pisan',
	'translationnotifications-freq-weekly' => 'Intisari saben minggu',
	'translationnotifications-freq-monthly' => 'Intisari saben sasi',
	'translationnotifications-submit' => 'Anyari pangaturan',
	'translationnotifications-signup-success' => 'Prèferènsi wara-wara terjemahan Sampéyan wis disimpen.',
	'notifytranslators' => 'Élingaké panerjemah',
	'translationnotifications-submit-ok' => 'Wara-wara wis ditambahaké nèng antrian lan diteraké déning tugas latar mburi.',
	'translationnotifications-send-notification-button' => 'Kirim wara-wara nèng panerjemah',
	'translationnotifications-deadline-label' => 'Wates wektu kanggo wara-wara iki:',
	'translationnotifications-languages-to-notify-label' => 'Basa sing arep dièlingaké:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kodhé basa dipisah koma, bènaké kosong kanggo ngèlingaké tumrap kabèh basa.',
	'translationnotifications-priority' => 'Prioritas:',
	'translationnotifications-priority-high' => 'dhuwur',
	'translationnotifications-priority-medium' => 'sedhengan',
	'translationnotifications-priority-low' => 'cedhek',
	'translationnotifications-priority-unset' => '(durung disetèl)',
	'translationnotifications-translatablepage-title' => 'Jeneng kaca sing bisa diterjemahaké:',
	'translationnotifications-error-no-translatable-pages' => 'Ora ana kaca sing bisa diterjemahaké nèng wiki iki.',
	'translationnotifications-email-subject' => 'Mangga terjemahaké kaca $1',
	'translationnotifications-notification-url-listitem' => 'terjemahaké $1',
	'translationnotifications-digestemail-subject' => 'Kirim intisasi nèng layang èlèktronik kanggo panjalukan terjemahan saka {{SITENAME}}',
	'translationnotifications-digestemail-notification-line' => 'Tanggal $1, $2 nandhai "$3" kanggo terjemahan. Sampéyan bisa nerjemahaké kuwi nèng $4',
	'translationnotifications-edit-summary' => 'Wara-wara terjemahan: $1',
	'translationnotifications-email-priority' => 'Prioritas kaca iki $1.',
	'translationnotifications-email-deadline' => 'Wates  wektu kanggo nerjemahaké kaca iki $1.',
	'log-name-notifytranslators' => 'Wara-wara terjemahan',
	'log-description-notifytranslators' => 'Log wara-wara dikirim nèng panerjemah bab kaca-kaca sing bisa diterjemahaké',
	'translationnotifications-sent-title' => 'Wara-wara terjemahan kakirim',
	'translationnotifications-sent-body' => 'Wara-wara terjemahan dikirim.',
	'translationnotifications-log-alllanguages' => 'kabèh basa',
	'translationnotifications-nodeadline' => 'ora ana',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'translationnotifications-info' => 'ინფორმაცია მომხმარებელზე',
	'translationnotifications-username' => 'მომხმარებლის სახელი:',
	'translationnotifications-emailstatus' => 'ელ-ფოსტის სტატუსი:',
	'translationnotifications-email-confirmed' => 'თქვენი ელ. ფოსტის მისამართი დადასტურებულია',
	'translationnotifications-languages' => 'ენები',
	'translationnotifications-lang' => 'ენა №$1',
	'translationnotifications-nolang' => 'აირჩიეთ ენა',
	'translationnotifications-cmethod-email' => 'ელ. ფოსტა',
	'translationnotifications-cmethod-talkpage' => 'განხილვის გვერდი',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'განხილვის გვერდი სხვა ვიკიში',
	'translationnotifications-cmethod-feed' => 'არხი',
	'translationnotifications-freq-weekly' => 'ყოველკვირეული დაიჯესტი',
	'translationnotifications-freq-monthly' => 'ყოველთვიური დაიჯესტი',
	'translationnotifications-submit' => 'პარამეტრების განახლება',
	'translationnotifications-priority' => 'პრიორიტეტი:',
	'translationnotifications-priority-high' => 'მაღალი',
	'translationnotifications-priority-medium' => 'საშუალო',
	'translationnotifications-priority-low' => 'დაბალი',
	'translationnotifications-priority-unset' => '(არ არის არჩეული)',
	'translationnotifications-translatablepage-title' => 'თარგმნადი გვერდის სახელი:',
	'translationnotifications-email-subject' => 'გთხოვთ, თარგმნეთ გვერდი $1',
	'translationnotifications-log-alllanguages' => 'ყველა ენა',
	'translationnotifications-nodeadline' => 'არა',
);

/** Korean (한국어)
 * @author Kwj2772
 * @author 아라
 */
$messages['ko'] = array(
	'translatorsignup' => '번역자 가입',
	'translatorsignup-summary' => '번역할 언어를 나타내고 새로운 번역 요청에 대해 연락을 하고 싶어하는지에 대해 이 문서를 사용합니다.',
	'translationnotifications-desc' => '번역자가 번역 알림에 가입 허용',
	'translationnotifications-info' => '사용자 정보',
	'translationnotifications-username' => '사용자 이름:',
	'translationnotifications-emailstatus' => '이메일 상태:',
	'translationnotifications-email-confirmed' => '이메일 주소가 인증되었습니다',
	'translationnotifications-email-disablemail' => '이메일 주소가 인증되었지만 [[Special:Preferences|사용자 환경 설정]]에서 이메일의 수신을 요청하지 않았습니다.',
	'translationnotifications-email-unconfirmed' => '이메일 주소가 인증되지 않았습니다. $1',
	'translationnotifications-email-notset' => '이메일 주소를 적지 않았습니다. [[Special:Preferences|환경 설정]]에서 이를 적을 수 있습니다.',
	'translationnotifications-languages' => '언어',
	'translationnotifications-lang' => '언어 #$1',
	'translationnotifications-nolang' => '언어 선택',
	'translationnotifications-contact' => '선호하는 연락 방법',
	'translationnotifications-cmethod-email' => '이메일',
	'translationnotifications-cmethod-talkpage' => '토론 문서',
	'translationnotifications-cmethod-talkpage-elsewhere' => '다른 위키에서의 토론 문서',
	'translationnotifications-cmethod-feed' => '피드',
	'translationnotifications-frequency' => '연락 빈도',
	'translationnotifications-freq-always' => '번역의 새로운 무언가가 있을 때',
	'translationnotifications-freq-week' => '일주일에 많아야 한 번',
	'translationnotifications-freq-month' => '한달에 많아야 한 번',
	'translationnotifications-freq-weekly' => '주마다 알림',
	'translationnotifications-freq-monthly' => '월마다 알림',
	'translationnotifications-submit' => '설정 업데이트',
	'translationnotifications-signup-success' => '사용자 번역 알림 환경 설정이 저장되었습니다.',
	'notifytranslators' => '번역자에게 알림',
	'translationnotifications-submit-ok' => '알림이 대기열에 추가하고 백그라운드 작업으로 전달됩니다.',
	'translationnotifications-send-notification-button' => '번역자한테 알림 보내기',
	'translationnotifications-deadline-label' => '이 알림에 나타나는 마감일:',
	'translationnotifications-languages-to-notify-label' => '어떤 언어 알리기:',
	'translationnotifications-languages-to-notify-label-help-message' => '쉼표로 구분한 언어 코드; 모든 언어에 대해 알림을 비웁니다.',
	'translationnotifications-priority' => '우선 순위:',
	'translationnotifications-priority-high' => '높음',
	'translationnotifications-priority-medium' => '중간',
	'translationnotifications-priority-low' => '낮음',
	'translationnotifications-priority-unset' => '(미설정)',
	'translationnotifications-translatablepage-title' => '번역 가능한 문서 이름:',
	'translationnotifications-error-no-translatable-pages' => '이 위키에 번역 가능한 문서가 없습니다.',
	'translationnotifications-email-subject' => '$1 문서를 번역하세요',
	'translationnotifications-email-body' => '$1 안녕하세요,

{{SITENAME}}에 $2{{PLURAL:$9|로}} 번역에 {{GENDER:$10|가입}}했기 때문에 이 이메일을 받았습니다.

여기에 번역에 대한 문서가 있습니다: $3.
다음 링크를 클릭하여 번역할 수 있습니다:
$4

$5
$6

$7

여러분의 도움을 높게 평가하고 있습니다. 여러분과 같은 번역자는 진정한
다언어 공동체로서 {{SITENAME}}에 돕습니다.

감사합니다!
{{SITENAME}} 번역 담당자

----

{{SITENAME}}에 번역에 대해 이메일을 받도록 가입했기 때문에 이 이메일을 받았습니다. 구독을 취소하거나 번역에 대한 사용자 알림 환경 설정을 바꾸려면 $8로 방문하세요.',
	'translationnotifications-talkpage-body' => '$2 안녕하세요,

{{SITENAME}}에 $3{{PLURAL:$9|로}} 번역에 {{GENDER:$1|가입}}했기 때문에 이 알림을 받았습니다.
번역에 대해 [[$4]] 문서가 있습니다. 여기서 이를 번역할 수 있습니다:
$5

$6
$7

$8

여러분의 도움을 높게 평가하고 있습니다. 여러분과 같은 번역자는 진정한
다언어 공동체로서 {{SITENAME}}에 돕습니다.

감사합니다!

{{SITENAME}} 번역 담당자',
	'translationnotifications-notification-url-listitem' => '$1 번역',
	'translationnotifications-digestemail-subject' => '{{SITENAME}}에서 번역 요청에 대해 이메일로 알립니다',
	'translationnotifications-digestemail-body' => '$1 안녕하세요,

{{SITENAME}}에 $2로 번역에 {{GENDER:$1|가입}}했기 때문에 이 이메일을 받았습니다.

번역에 대한 문서 $3개가 있습니다. 자세한 내용은 아래에 있습니다.

$4

여러분의 도움을 높게 평가하고 있습니다. 여러분과 같은 번역자는 진정한
다언어 공동체로서 {{SITENAME}}에 돕습니다.

감사합니다!
{{SITENAME}} 번역 관리자

----

{{SITENAME}}에 번역에 대해 이메일을 받도록 가입했기 때문에 이 이메일을 받았습니다. 구독을 취소하거나 번역에 대한 사용자 알림 환경 설정을 바꾸려면 <$5>로 방문하세요.',
	'translationnotifications-digestemail-notification-line' => '$1에 $2 사용자가 "$3" 번역을 표시했습니다. $4에서 이를 번역할 수 있습니다.',
	'translationnotifications-edit-summary' => '번역 알림: $1',
	'translationnotifications-email-priority' => '이 문서의 우선 순위는 $1입니다.',
	'translationnotifications-email-deadline' => '이 문서의 번역에 대한 마감일은 $1입니다.',
	'logentry-translationnotifications-sent' => '$1 사용자가 $3 번역 문서에 대한 알림을 {{GENDER:$2|보냈습니다}}. {{PLURAL:$1|언어}}: $4; 마감일: $5; 우선 순위: $6; {{PLURAL:$7|받는 사람 한명|받는 사람 $7명}}한테 보냄, {{PLURAL:$8|받는 사람 한명|받는 사람 $8명}}한테 보내기 실패, {{PLURAL:$9|받는 사람 한명|받는 사람 $9명}}한테 보내기 생략',
	'log-name-notifytranslators' => '번역 알림',
	'log-description-notifytranslators' => '번역 가능한 문서에 대한 알림을 번역자한테 보낸 기록입니다',
	'translationnotifications-sent-title' => '번역 알림 보내기',
	'translationnotifications-sent-body' => '번역 알림을 보냈습니다.',
	'translationnotifications-log-alllanguages' => '모든 언어',
	'translationnotifications-nodeadline' => '없음',
	'translationnotifications-signup-legal' => '우리가 당신에게 관심이 있을 것으로 생각하는 {{SITENAME}}에 우리가 관련 있는 주제와 관련하여 연락을 할 수 있도록 이 정보를 제공하는 데 동의합니다. 데이터에 동의하면 [[{{MediaWiki:Privacypage}}|개인정보 정책]]의 적용을 받습니다.',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'translatorsignup' => 'Övversäzer-Rejeßter',
	'translatorsignup-summary' => 'En heh dä Sigg deihs De faßlääje, noh wat för en Schprooche De övversäze kanns, un wi un of De Opforderonge för et Övversäze krijje wells.',
	'translationnotifications-desc' => 'Määd_et müjjelesch, dat Övversäzer sesch enschriive künne, öm sesch Nohreeschte övver onjedonn Övversäzongsärbeit schecke ze lohße.',
	'translationnotifications-info' => 'Metmaacher-Daate',
	'translationnotifications-username' => 'Metmaacher_Naame:',
	'translationnotifications-emailstatus' => 'Enschtällonge fö de <i lang="en">e-mail</i>:',
	'translationnotifications-email-confirmed' => 'Ding Addräß fö de <i lang="en">e-mail</i> es beschtätesch.',
	'translationnotifications-email-disablemail' => 'Ding Addräß fö de <i lang="en">e-mail</i> es beschtätesch, ävver Do häs en [[Special:Preferences|Dinge Enschtällonge]] faßjelaat, dat De kein <i lang="en">e-mail</i> kriß.',
	'translationnotifications-email-unconfirmed' => 'Ding Addräß fö de <i lang="en">e-mail</i> es nit beschtätesch. $1',
	'translationnotifications-email-notset' => 'Do häs kein Addräß fö Ding <i lang="en">e-mail</i> aanjejovve, ävver Do kanns dat en [[Special:Preferences|Dinge Enschtällonge]] nohholle.',
	'translationnotifications-languages' => 'Schprooche',
	'translationnotifications-lang' => 'Schprooch Nommer $1',
	'translationnotifications-nolang' => 'Söök en Schprooch uß',
	'translationnotifications-contact' => 'De jewönschte Wääje för der Kumtak',
	'translationnotifications-cmethod-email' => 'pä <i lang="en">e-mail</i>',
	'translationnotifications-cmethod-talkpage' => 'övver ming Klaafsigg heh',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'övver ming Klaafsigg en enem andere Wiki',
	'translationnotifications-cmethod-feed' => 'övver ene Abonnomangs-Kannal (<i lang="en">Feed</i>)',
	'translationnotifications-frequency' => 'Wi öff mälde?',
	'translationnotifications-freq-always' => 'Wann et jät Neues zom Övversäze jit',
	'translationnotifications-freq-week' => 'Eimohl de Woch udder selldener',
	'translationnotifications-freq-month' => 'Eimohl der Mohnd udder winnijer',
	'translationnotifications-freq-weekly' => 'Zosammefassong vun der Woch',
	'translationnotifications-freq-monthly' => 'Moonatlesche Zosammefaßßong',
	'translationnotifications-submit' => 'Lohß jonn',
	'translationnotifications-signup-success' => 'Ding Enschtällonge för de Nohreeschte övver de Övversäzonge sin jäz faßjehallde.',
	'notifytranslators' => 'Övversäzer benohreeschtijje',
	'translationnotifications-submit-ok' => 'De Metdeilonge sin jäz aam Waade un wääde us Schlang vun enem Hengerjrondsprojramm noh un bei verscheck.',
	'translationnotifications-send-notification-button' => 'Donn en Metdeilong aan de Övversäzer verschecke',
	'translationnotifications-deadline-label' => ' Deadline in heh dä Metdeilong:', # Fuzzy
	'translationnotifications-languages-to-notify-label' => 'Opforderonge för wat för en Schprooche verschecke:',
	'translationnotifications-languages-to-notify-label-help-message' => 'En Leß met Köözele för Schprooche met Kommas derzwesche. Don nix enjävve, öm alle Schprooche ze krijje.',
	'translationnotifications-priority' => 'Rang:',
	'translationnotifications-priority-high' => 'huh',
	'translationnotifications-priority-medium' => 'meddel',
	'translationnotifications-priority-low' => 'klein',
	'translationnotifications-priority-unset' => '(nit jesaz)',
	'translationnotifications-translatablepage-title' => 'der Naame vun dä Sigg för zem Övversäze:',
	'translationnotifications-error-no-translatable-pages' => 'Mer han kein övversäzbaa Sigge em Wiki.',
	'translationnotifications-email-subject' => 'Bes esu jood un donn de Sigg „$1“ övversäze',
	'translationnotifications-email-body' => "Daach $1,

heh di e-mail kriß De, weil De Desch als ene Övversäzer för de {{PLURAL:$9|Schprooch|Schprooche|kein Schprooche}} $2 op {{GRAMMAR:3|{{SITENAME}}}} enjedraare häs.

Di Sigg „$3“ mööd övversaz wääde.
Dat kanns De övver heh dä Lengk donn:
$4

$5
$6

$7

Ding Hölp es ärsch jään jesinn. Als Övversäzer helfs De met, dat {{GRAMMAR:1{{SITENAME}}}} als en Gemeinschaff met ville Schprooche joot doh schteiht.

Onsere häzlejje Dank doför saare
de Ko'odenatoore vun de Övversäzonge {{GRAMMAR:2 v{{SITENAME}}}}

----

Do häs heh di e-mail krääje, weil De Desch op {{GRAMMAR:3|{{SITENAME}}}} enjedraare häs, dat De e-mails krijje wells, di met de Övversäzonge ze donn han. Wann De doh jät draan ändere wells, jangk noh $8.", # Fuzzy
	'translationnotifications-talkpage-body' => "Daach $2,

Do kriß heh di Metdeilong, weil De Desch als ene Övversäzer för de {{PLURAL:$9|Schprooch|Schprooche|kein Schprooche}} $3 op {{GRAMMAR:3|{{SITENAME}}}} enjedraare häs.

Di Sigg „[[$4]]“ mööd övversaz wääde.
Dat kanns De övver heh dä Lengk donn:
$5

$6
$7

$8

Ding Hölp es ärsch jään jesinn. Als Övversäzer helfs De met, dat {{GRAMMAR:1{{SITENAME}}}} als en Gemeinschaff met ville Schprooche joot doh schteiht.

Onsere häzlejje Dank doför saare

de Ko'odenatoore vun de Övversäzonge {{GRAMMAR:2 v{{SITENAME}}}}", # Fuzzy
	'translationnotifications-notification-url-listitem' => 'övversäze op $1',
	'translationnotifications-digestemail-subject' => 'Zosammejefaß Metdeilong för Övversäzonge {{GRAMMAR:2 v|{{SITENAME}}}}',
	'translationnotifications-digestemail-body' => "Daach $1,

heh di e-mail kriß De, weil De Desch als ene Övversäzer för $2 op {{GRAMMAR:3|{{SITENAME}}}} enjedraare häs.

{{PLURAL:$3|Ein Sigg|$3 Sigge|Kein Sigg}} mööd övversaz wääde. De Einzelheite schtonn onge.

$4

Ding Hölp es ärsch jään jesinn. Als Övversäzer helfs De met, dat {{GRAMMAR:1{{SITENAME}}}} als en Gemeinschaff met ville Schprooche joot doh schteiht.

Onsere häzlejje Dank doför saare
de Ko'odenatoore vun de Övversäzonge {{GRAMMAR:2 v{{SITENAME}}}}

----

Do häs heh di e-mail krääje, weil De Desch op {{GRAMMAR:3|{{SITENAME}}}} enjedraare häs, dat De e-mails krijje wells, di met de Övversäzonge ze donn han. Wann De doh jät draan ändere wells, jangk noh $5.", # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Aam $1 hät {{GENDER:$2|dä|et|dä Metmaacher|de|dat}} $2 di Sigg „$3“ för et Övversäze freijejovve. Do kanns se övversäzze op dä Sigg: $4',
	'translationnotifications-edit-summary' => 'Övversäzongsnohreesch: $1',
	'translationnotifications-email-priority' => 'Der Rang vun dä Sigg es $1.',
	'translationnotifications-email-deadline' => 'Di Sigg moß bes zom $1 övversaz sin.',
	'logentry-translationnotifications-sent' => '{{GENDER:$2|Dä|Dat|Dä Metmaacher|De|Dat}} $1 häd en Metdeilong övver et Övversäze vun dä Sigg $3 en dä Schproche $4, met däm Jeweesch $6 un däm Dattum $5 för fäädesch ze wääde aan {{PLURAL:$7|eine|$7|keine}} Metmaacher verscheck, för {{PLURAL:$8|eine |$8|keine}} Metmaacher hät dat nit jeflup un {{PLURAL:$9|eine|$9|keine}} woodte tiräk övverjange.', # Fuzzy
	'log-name-notifytranslators' => 'Logbooch vun de Opforderonge zem Övversäze',
	'log-description-notifytranslators' => 'Et Logbooch övver de Nohreeschte aan Övversäzere övver de övversäzbaa Sigge',
	'translationnotifications-sent-title' => 'Opforderonge verdeilt',
	'translationnotifications-sent-body' => 'De Opforderonge zom Övversäze sin verdeilt woode.',
	'translationnotifications-log-alllanguages' => 'all Schprooche',
	'translationnotifications-nodeadline' => 'kein',
);

/** Kurdish (Latin script) (Kurdî (latînî)‎)
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'translationnotifications-username' => 'Navê bikarhêner:',
	'translationnotifications-cmethod-email' => 'E-name',
	'translationnotifications-translatablepage-title' => 'Navê rûpela wergerbar:',
	'translationnotifications-log-alllanguages' => 'hemû ziman',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'translatorsignup' => 'Aschreiwen als Iwwersetzer',
	'translatorsignup-summary' => 'Benotzt dës Säit fir unzeginn a wat fir eng Sproochen Dir iwwersetze kënnt a wéi Dir iwwer Iwwersetzungsufroe wëllt kontaktéiert ginn.',
	'translationnotifications-desc' => "Erlaabt et Iwwersetzer fir sech op Iwwersetzungs-Noriichten z'abonnéieren",
	'translationnotifications-info' => 'Benotzerinformatioun',
	'translationnotifications-username' => 'Benotzernumm:',
	'translationnotifications-emailstatus' => 'E-Mail-Status:',
	'translationnotifications-email-confirmed' => 'Är E-Mailadress gouf confirméiert',
	'translationnotifications-email-disablemail' => 'Är E-Mail-Adress ass confirméiert, awer an [[Special:Preferences|Äre Preferenzen]] hutt Dir gefrot fir keng E-Mailen ze kréien.',
	'translationnotifications-email-unconfirmed' => 'Är E-Mailadress gouf net confirméiert. $1',
	'translationnotifications-email-notset' => 'Dir hutt keng E-Mailadress uginn. Dir kënnt dat an Ären [[Special:Preferences|Astellunge]] maachen.',
	'translationnotifications-languages' => 'Sproochen',
	'translationnotifications-lang' => 'Sprooch #$1',
	'translationnotifications-nolang' => 'Sicht eng Sprooch eraus',
	'translationnotifications-contact' => 'Wéi solle mir Iech kontaktéieren?',
	'translationnotifications-cmethod-email' => 'Mail',
	'translationnotifications-cmethod-talkpage' => 'Diskussiounssäit',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskussiounsäit op enger anerer Wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Heefegkeet vun de Benoriichtigungen',
	'translationnotifications-freq-always' => "Wann et eppes Neies z'iwwersetze gëtt",
	'translationnotifications-freq-week' => "Héchstens eemol d'Woch",
	'translationnotifications-freq-month' => 'Héchstens eemol de Mount',
	'translationnotifications-freq-weekly' => 'Wëchentleche Resumé',
	'translationnotifications-freq-monthly' => 'Monatleche Resumé',
	'translationnotifications-submit' => 'Astellungen aktualiséieren',
	'notifytranslators' => 'Iwwersetzer informéieren',
	'translationnotifications-send-notification-button' => "Eng Matdeelung un d'Iwwersetzer schécken",
	'translationnotifications-deadline-label' => 'Delai deen an dëser Matdeelung gesat gëtt:',
	'translationnotifications-languages-to-notify-label' => 'Wat fir Sprooche sollen informéiert ginn:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kommagetrennte Sproochcoden; eidel loosse fir Matdeelunge fir all Sproochen ze kréien.',
	'translationnotifications-priority' => 'Prioritéit:',
	'translationnotifications-priority-high' => 'héich',
	'translationnotifications-priority-medium' => 'mëttel',
	'translationnotifications-priority-low' => 'niddreg',
	'translationnotifications-priority-unset' => '(net agestallt)',
	'translationnotifications-translatablepage-title' => 'Numm vun der Säit déi iwwersat soll ginn:',
	'translationnotifications-error-no-translatable-pages' => "Et gëtt keng Säite fir z'iwwersetzen op dëser Wiki.",
	'translationnotifications-email-subject' => "Iwwersetzt w.e.g. d'Säit $1",
	'translationnotifications-notification-url-listitem' => 'op $1 iwwersetzen',
	'translationnotifications-digestemail-notification-line' => 'Den $1 huet de(n) $2 d\'Säit "$3" fir d\'Iwwersetze markéiert. Dir kënnt et op $4 iwwersetzen',
	'translationnotifications-edit-summary' => 'Iwwersetzungs-Matdeelungen: $1',
	'translationnotifications-email-priority' => "D'Prioritéit vun dëser Säit ass $1.",
	'translationnotifications-email-deadline' => "Den Delai fir dës säit z'iwwersetzen ass den $1.",
	'log-name-notifytranslators' => 'Iwwersetzungs-Matdeelungen',
	'translationnotifications-sent-title' => 'Iwwersetzungs-Matdeelung geschéckt',
	'translationnotifications-sent-body' => "D'Iwwersetzungs-Matdeelung gouf geschéckt",
	'translationnotifications-log-alllanguages' => 'all Sproochen',
	'translationnotifications-nodeadline' => 'keng',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'translatorsignup' => 'Пријава на преведувач',
	'translatorsignup-summary' => 'На оваа страница наведете ги јазиците на кои ќе преведувате и укажете како да ве контактираме кога има нови барања за превод.',
	'translationnotifications-desc' => 'Им овозможува на преведувачите да се пријават за известувања што се однесуваат на преведувањето',
	'translationnotifications-info' => 'Кориснички податоци',
	'translationnotifications-username' => 'Корисничко име:',
	'translationnotifications-emailstatus' => 'Статус на е-пошта:',
	'translationnotifications-email-confirmed' => 'Вашата е-пошта е потврдена',
	'translationnotifications-email-disablemail' => 'Вашата е-пошта е потврдена, но во [[Special:Preferences|нагодувањата]] укажавте дека не сакате да примате пошта.',
	'translationnotifications-email-unconfirmed' => 'Вашата е-пошта не е потврдена. $1',
	'translationnotifications-email-notset' => 'Немате наведено е-пошта. Тоа можете да го сторите во вашите [[Special:Preferences|нагодувања]].',
	'translationnotifications-languages' => 'Јазици',
	'translationnotifications-lang' => 'Јазик бр. $1',
	'translationnotifications-nolang' => 'Изберете јазик',
	'translationnotifications-contact' => 'Претпочитан начин на контакт',
	'translationnotifications-cmethod-email' => 'Е-пошта',
	'translationnotifications-cmethod-talkpage' => 'Страница за разговор',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Страница за разговор на друго вики',
	'translationnotifications-cmethod-feed' => 'Канал',
	'translationnotifications-frequency' => 'Честота на контактот',
	'translationnotifications-freq-always' => 'Кога ќе се појави нешто ново за преведување',
	'translationnotifications-freq-week' => 'Највеќе еднаш неделно',
	'translationnotifications-freq-month' => 'Највеќе еднаш месечно',
	'translationnotifications-freq-weekly' => 'Неделен преглед',
	'translationnotifications-freq-monthly' => 'Месечен преглед',
	'translationnotifications-submit' => 'Измени поставки',
	'translationnotifications-signup-success' => 'Вашите нагодувања на преводните известувања се зачувани.',
	'notifytranslators' => 'Известување на преведувачите',
	'translationnotifications-submit-ok' => 'Известувањата се додадени во редицата на чекање и се испорачуваат со позадинска задача.',
	'translationnotifications-send-notification-button' => 'Испрати известување до преведувачите',
	'translationnotifications-deadline-label' => 'Рок во известувањето:',
	'translationnotifications-languages-to-notify-label' => 'Кои јазици да се известат:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Јазични кодови одделени со запирка; оставете го ова празно ако сакате да ги известите сите јазици.',
	'translationnotifications-priority' => 'Приоритет:',
	'translationnotifications-priority-high' => 'висок',
	'translationnotifications-priority-medium' => 'среден',
	'translationnotifications-priority-low' => 'низок',
	'translationnotifications-priority-unset' => '(незададен)',
	'translationnotifications-translatablepage-title' => 'Име на преводливата страница:',
	'translationnotifications-error-no-translatable-pages' => 'На ова вики нема преводливи страници.',
	'translationnotifications-email-subject' => 'Преведете ја пораката $1',
	'translationnotifications-email-body' => 'Здраво $1,

Писмово го примате бидејќи  {{GENDER:$10|се пријавивте}} за преведувач {{PLURAL:$9|на}} $2 на {{SITENAME}}.

Има нова страница што треба да се преведе: $3.
Преведете ја на следнава врска:
$4

$5
$6

$7

Вашата помош многу ни значи. Благодарение на преведувачите како вас, {{SITENAME}} 
функционира како вистинска повеќејазична заедница.

Ви благодариме!
Преводните усогласувачи на {{SITENAME}}


----

Поракава ја добивате бидејќи се пријавивте да примате пошта во врска со преводи на {{SITENAME}}. Ако сакате да се откажете од известувањата или  да ги измените нагодувањата за истите, посетете ја страницата $8',
	'translationnotifications-talkpage-body' => 'Здраво $2,

Го добивате ова известување бидејќи {{GENDER:$10|се пријавивте}} за преведувач {{PLURAL:$9|на}} {{SITENAME}} на $3.
Новата страница [[$4]] чека на преведување. Ве молиме, преведете ја тука:
$5

$6
$7

$8


Вашата помош многу ни значи. Благодарение на преведувачите како вас, {{SITENAME}} 
функционира како вистинска повеќејазична заедница.

Ви благодариме!

Преводните усогласувачи на {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'преведи на $1',
	'translationnotifications-digestemail-subject' => 'Преглед на барања за превод од {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Здраво $1,

Го добивате ова известување бидејќи се пријавивте за преведувач на $2 на {{SITENAME}}.

Имате {{PLURAL:$3|1 страница|$3 страници}} за преведување. Повеќе подробности подолу.

$4

Вашата помош многу ни значи. Благодарение на преведувачите како вас, {{SITENAME}} 
функционира како вистинска повеќејазична заедница.

Ви благодариме!
Преводните администратори на {{SITENAME}}

----

Поракава ја добивате бидејќи се пријавивте да примате пошта во врска со преводи на {{SITENAME}}. Ако сакате да се откажете од известувањата или да ги измените нагодувањата за истите, посетете ја страницата <$5>',
	'translationnotifications-digestemail-notification-line' => 'На $1, $2 ја означи страницата „$3“ за преведување. Преведете ја на $4',
	'translationnotifications-edit-summary' => 'Известување за превод: $1',
	'translationnotifications-email-priority' => 'Приоритетот на оваа страница е $1.',
	'translationnotifications-email-deadline' => 'Крајниот рок за преведување на оваа страница е $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|испрати}} известување за преведување на страницата $3; {{PLURAL:$10|јазик|јазици}}: $4; краен рок: $5; приоритет: $6. Известувањето е испратено на {{PLURAL:$7|еден примач|$7 примачи}}, не успеа кај {{PLURAL:$8|еден примач|$8 примачи}} и изостави {{PLURAL:$9|еден примач|$9 примачи}}',
	'log-name-notifytranslators' => 'Известувања за преведување',
	'log-description-notifytranslators' => 'Дневник на известувањата што им се испраќаат на преведувачите со што им се соопштува кои страници се достапни за преведување',
	'translationnotifications-sent-title' => 'Известувањето за преведување е испратено',
	'translationnotifications-sent-body' => 'Известувањето за преведување е испратено.',
	'translationnotifications-log-alllanguages' => 'сите јазици',
	'translationnotifications-nodeadline' => 'без рок',
	'translationnotifications-signup-legal' => 'Поднесувајќи ги овие информации, се согласувате да бидете контактирани во врска со темите поврзани со {{SITENAME}} што мислиме дека ќе ве интересираат. Се согласувате дека вашите податоци подлежат на нашите [[{{MediaWiki:Privacypage}}|правила за заштита на личните податоци.]]',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 * @author Santhosh.thottingal
 */
$messages['ml'] = array(
	'translatorsignup' => 'പരിഭാഷകർക്ക് പേരുചേർക്കാം',
	'translationnotifications-info' => 'ഉപയോക്താവിന്റെ വിവരങ്ങൾ',
	'translationnotifications-username' => 'ഉപയോക്തൃനാമം:',
	'translationnotifications-emailstatus' => 'ഇമെയിൽ സ്ഥിതി:',
	'translationnotifications-email-confirmed' => 'താങ്കളുടെ ഇമെയിൽ വിലാസം സ്ഥിരീകരിച്ചതാണ്',
	'translationnotifications-email-disablemail' => 'താങ്കളുടെ ഇമെയിൽ വിലാസം സ്ഥിരീകരിച്ചതാണ്, പക്ഷേ താങ്കൾ [[Special:Preferences|താങ്കളുടെ ക്രമീകരണങ്ങളിൽ]] ഇമെയിൽ സ്വീകരിക്കേണ്ടതില്ല എന്നാണ് തിരഞ്ഞെടുത്തിരിക്കുന്നത്.',
	'translationnotifications-email-unconfirmed' => 'താങ്കളുടെ ഇമെയിൽ വിലാസം സ്ഥിരീകരിക്കപ്പെട്ടിട്ടില്ല. $1',
	'translationnotifications-email-notset' => 'താങ്കൾ ഇമെയിൽ വിലാസം നൽകിയിട്ടില്ല. താങ്കൾക്കത് [[Special:Preferences|താങ്കളുടെ ക്രമീകരണങ്ങളിൽ]] നൽകാവുന്നതാണ്.',
	'translationnotifications-languages' => 'ഭാഷകൾ',
	'translationnotifications-lang' => 'ഭാഷ #$1',
	'translationnotifications-nolang' => 'ഭാഷ തിരഞ്ഞെടുക്കുക',
	'translationnotifications-contact' => 'ബന്ധപ്പെടുന്നതിനുള്ള മാർഗ്ഗങ്ങൾ',
	'translationnotifications-cmethod-email' => 'ഇമെയിൽ',
	'translationnotifications-cmethod-talkpage' => 'സം‌വാദം താൾ',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'വേറൊരു വിക്കിയിലെ സംവാദതാൾ',
	'translationnotifications-cmethod-feed' => 'ഫീഡ്',
	'translationnotifications-frequency' => 'ബന്ധപ്പെടേണ്ട ആവൃത്തി',
	'translationnotifications-freq-always' => 'പുതുതായി എന്തെങ്കിലും തർജ്ജമ ചെയ്യാനുള്ളപ്പോൾ',
	'translationnotifications-freq-week' => 'ആഴ്ചയിൽ പരമാവധി ഒരു തവണ',
	'translationnotifications-freq-month' => 'മാസത്തിൽ പരമാവധി ഒരു തവണ',
	'translationnotifications-freq-weekly' => 'ആഴ്ചതോറും സമാഹാരം',
	'translationnotifications-freq-monthly' => 'മാസം  തോറും സമാഹാരം',
	'translationnotifications-submit' => 'സജ്ജീകരണങ്ങൾ പുതുക്കുക',
	'translationnotifications-signup-success' => 'താങ്കൾക്കുള്ള പരിഭാഷാ അറിയിപ്പുകളുടെ സജ്ജീകരണങ്ങൾ സേവ് ചെയ്തിരിക്കുന്നു.',
	'notifytranslators' => 'പരിഭാഷകർക്കുള്ള അറിയിപ്പുകൾ',
	'translationnotifications-submit-ok' => 'അറിയിപ്പുകൾ നിരയിലേയ്ക്ക് ചേർത്തിരിക്കുന്നു, അത് വെളിയിൽ കാണാനാവാത്ത സൗകര്യമുപയോഗിച്ച് വിതരണം ചെയ്യുന്നതാണ്.',
	'translationnotifications-send-notification-button' => 'പരിഭാഷകർക്ക് അറിയിപ്പുകൾ അയയ്ക്കുക',
	'translationnotifications-deadline-label' => 'ഈ അറിയിപ്പിൽ കുറിക്കേണ്ട അവസാന തീയതി:',
	'translationnotifications-languages-to-notify-label' => 'ഏതൊക്കെ ഭാഷകളെയാണു് അറിയിക്കേണ്ടത്:',
	'translationnotifications-languages-to-notify-label-help-message' => 'ഭാഷാ കോഡുകൾ കോമ ഉപയോഗിച്ച് വേർതിരിച്ചുനൽകുക; എല്ലാ ഭാഷകളുടേയും അറിയിപ്പിനായി വെറുതെയിടുക.',
	'translationnotifications-priority' => 'പ്രാധാന്യം:',
	'translationnotifications-priority-high' => 'ഉന്നതം',
	'translationnotifications-priority-medium' => 'ഇടത്തരം',
	'translationnotifications-priority-low' => 'കുറവ്',
	'translationnotifications-priority-unset' => '(സജ്ജീകരിച്ചിട്ടില്ല)',
	'translationnotifications-translatablepage-title' => 'പരിഭാഷപ്പെടുത്താവുന്ന താളിന്റെ പേര്:',
	'translationnotifications-error-no-translatable-pages' => 'ഈ വിക്കിയിൽ തർജ്ജമ ചെയ്യാവുന്ന താളുകളൊന്നും ഇല്ല.',
	'translationnotifications-email-subject' => 'ദയവായി ഈ താൾ പരിഭാഷപ്പെടുത്തുക: $1',
	'translationnotifications-email-body' => 'നമസ്കാരം $1,

{{SITENAME}} സംരംഭത്തിൽ $2 ഭാഷയുടെ പരിഭാഷയ്ക്കായി പേരുചേർത്തിട്ടുള്ളതിനാലാണ് താങ്കൾക്ക് ഈ ഇമെയിൽ അയയ്ക്കുന്നത്.

അവിടെ $3 എന്ന താൾ പരിഭാഷയ്ക്കായി ഉണ്ട്.
താഴെക്കൊടുത്തിരിക്കുന്ന കണ്ണി ഉപയോഗിച്ച് താങ്കൾക്ക് അത് പരിഭാഷപ്പെടുത്താവുന്നതാണ്.
$4

$5
$6

$7

താങ്കളുടെ സഹായത്തിനു വളരെയേറെ നന്ദി. താങ്കളെപ്പോലുള്ള പരിഭാഷകരാണ്, യഥാർത്ഥ ബഹുഭാഷാസമൂഹമായി പ്രവർത്തിച്ച് {{SITENAME}} സംരംഭത്തിന്റെ പ്രവർത്തനങ്ങൾ യാഥാർത്ഥ്യമാക്കുന്നത്.

നന്ദി!
{{SITENAME}} തർജ്ജമാ ഏകോപനസംഘം

----

{{SITENAME}} സംരംഭത്തിൽ പരിഭാഷയ്ക്കായി പേരുചേർത്തിട്ടുള്ളതിനാലാണ് താങ്കൾക്ക് ഈ ഇമെയിൽ അയയ്ക്കുന്നതു്. ഈ അറിയിപ്പുകൾ വേണ്ടെങ്കിലോ അറിയിക്കേണ്ട  രീതി മാറ്റണമെങ്കിലോ $8 ദയവായി സന്ദർശിക്കുക.', # Fuzzy
	'translationnotifications-edit-summary' => 'പരിഭാഷാ അറിയിപ്പ്: $1',
	'translationnotifications-email-priority' => 'ഈ താളിന്റെ മുൻഗണന $1 ആണ്.',
	'translationnotifications-email-deadline' => 'ഈ താൾ പരിഭാഷപ്പെടുത്തുന്നതിനുള്ള അവസാന തീയതി $1 ആണ്.',
	'logentry-translationnotifications-sent' => 'പരിഭാഷപ്പെടുത്താനുള്ള താൾ $3; ഭാഷകൾ: $4; അവസാന തീയതി: $5; മുൻഗണന: $6; എന്നിവയുള്ള അറിയിപ്പ് {{PLURAL:$7|ഒരു സ്വീകർത്താവിന്|$7 സ്വീകർത്താക്കൾക്ക്}} $1 {{GENDER:$2|അയച്ചു}},  {{PLURAL:$8|ഒരു സ്വീകർത്താവിനുള്ളത്|$8 സ്വീകർത്താക്കൾക്കുള്ളത്}} പരാജയപ്പെട്ടു, {{PLURAL:$9|ഒരു സ്വീകർത്താവിനുള്ളത്|$9 സ്വീകർത്താക്കൾക്കുള്ളത്}} ഒഴിവാക്കി', # Fuzzy
	'log-name-notifytranslators' => 'പരിഭാഷാ അറിയിപ്പുകൾ',
	'translationnotifications-sent-title' => 'പരിഭാഷാ അറിയിപ്പു് അയച്ചിരിക്കുന്നു.',
	'translationnotifications-sent-body' => 'പരിഭാഷാ അറിയിപ്പു് അയച്ചിരിക്കുന്നു.',
	'translationnotifications-log-alllanguages' => 'എല്ലാ ഭാഷകളും',
	'translationnotifications-nodeadline' => 'ഒന്നുമില്ല',
	'translationnotifications-signup-legal' => '{{SITENAME}} എന്ന വിക്കിയെക്കുറിച്ചു് നിങ്ങള്‍ക്കു് താത്പര്യമുണ്ടായേക്കാവുന്ന വിവരങ്ങള്‍ സംബന്ധിച്ചു് ഞങ്ങള്‍ക്കു് നിങ്ങളെ ബന്ധപ്പെടാമെന്നു നിങ്ങള്‍ സമ്മതിയ്ക്കുന്നു. നിങ്ങള്‍ തരുന്ന വിവരങ്ങള്‍ [[{{MediaWiki:Privacypage}}|സ്വകാര്യതാനയം]] അനുസരിച്ചു്ആയിരിക്കും  എന്നും നിങ്ങള്‍ സമ്മതിയ്ക്കുന്നു.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'translatorsignup' => 'Pendaftaran penterjemah',
	'translatorsignup-summary' => 'Gunakan laman ini untuk menyatakan anda boleh menterjemah kepada bahasa-bahasa yang mana, dan bagaimana anda mahu dihubungi tentang permohonan baru untuk penterjemahan.',
	'translationnotifications-desc' => 'Membolehkan penterjemah untuk mendaftar diri untuk pemberitahuan penterjemahan',
	'translationnotifications-info' => 'Maklumat pengguna',
	'translationnotifications-username' => 'Nama pengguna:',
	'translationnotifications-emailstatus' => 'Status e-mel:',
	'translationnotifications-email-confirmed' => 'Alamat e-mel anda telah disahkan',
	'translationnotifications-email-disablemail' => 'Alamat e-mel anda telah disahkan, tetapi dalam [[Special:Preferences|keutamaan anda]], anda memohon untuk tidak menerima e-mel.',
	'translationnotifications-email-unconfirmed' => 'Alamat e-mel anda belum disahkan. $1',
	'translationnotifications-email-notset' => 'Anda belum menyatakan alamat e-mel. Anda boleh berbuat demikian dalam [[Special:Preferences|keutamaan]] anda.',
	'translationnotifications-languages' => 'Bahasa',
	'translationnotifications-lang' => 'Bahasa #$1',
	'translationnotifications-nolang' => 'Pilih bahasa',
	'translationnotifications-contact' => 'Kaedah perhubungan yang digemari',
	'translationnotifications-cmethod-email' => 'E-mel',
	'translationnotifications-cmethod-talkpage' => 'Laman perbincangan',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Laman perbincangan di wiki lain',
	'translationnotifications-cmethod-feed' => 'Suapan',
	'translationnotifications-frequency' => 'Kekerapan perhubungan',
	'translationnotifications-freq-always' => 'Apabila ada bahan baru untuk diterjemah',
	'translationnotifications-freq-week' => 'Paling kerap seminggu sekali',
	'translationnotifications-freq-month' => 'Paling kerap sebulan sekali',
	'translationnotifications-freq-weekly' => 'Ikhtisar mingguan',
	'translationnotifications-freq-monthly' => 'Ikhtisar bulanan',
	'translationnotifications-submit' => 'Kemaskinikan tetapan',
	'translationnotifications-signup-success' => 'Keutamaan pemberitahuan penterjemahan anda telah disimpan.',
	'notifytranslators' => 'Beritahu penterjemah',
	'translationnotifications-submit-ok' => 'Pemberitahuan telah ditambahkan dalam baris gilir dan dikirim oleh kerja latar belakang.',
	'translationnotifications-send-notification-button' => 'Hantar pemberitahuan kepada para penterjemah',
	'translationnotifications-deadline-label' => 'Tarikh tutup untuk dinyatakan dalam pemberitahuan ini:',
	'translationnotifications-languages-to-notify-label' => 'Bahasa-bahasa untuk diberitahukan:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kod bahasa diasing-asingkan oleh koma; biarkan kosong untuk memberitahu untuk semua bahasa.',
	'translationnotifications-priority' => 'Prioriti:',
	'translationnotifications-priority-high' => 'tinggi',
	'translationnotifications-priority-medium' => 'sederhana',
	'translationnotifications-priority-low' => 'rendah',
	'translationnotifications-priority-unset' => '(belum ditetapkan)',
	'translationnotifications-translatablepage-title' => 'Nama laman boleh terjemah:',
	'translationnotifications-error-no-translatable-pages' => 'Tiada laman yang boleh diterjemahkan dalam wiki ini.',
	'translationnotifications-email-subject' => 'Sila terjemahkan laman $1',
	'translationnotifications-email-body' => '$1,

Anda menerima e-mel ini kerana anda telah {{GENDER:$10|mendaftar diri}} sebagai penterjemah kepada {{PLURAL:$9|bahasa|bahasa-bahasa}} $2 di {{SITENAME}}.

Ada satu halaman untuk diterjemahkan di situ: $3.

Anda boleh menterjemahkannya dengan mengklik pautan yang berikut:
$4

$5
$6

$7

Pertolongan anda amat dihargai. Para penterjemah seperti anda membantu {{SITENAME}} berfungsi sebagai komuniti berbilang bahasa yang sejati.

Terima kasih!

Penyelaras penterjemahan {{SITENAME}}

----

Anda menerima e-mel ini kerana anda telah mendaftar untuk menerima e-mel yang berkaitan dengan penterjemahan di {{SITENAME}}. Untuk membatalkan langganan atau menukar tetapan pemberitahuan anda, sila layari $8.',
	'translationnotifications-talkpage-body' => '$2,

Anda sedang menerima pemberitahuan ini kerana anda {{GENDER:$1|mendaftar diri}} sebagai penterjemah ke {{PLURAL:$9|bahasa|bahasa-bahasa}} $3 di {{SITENAME}}.

Satu halaman baru, [[$4]] sedia untuk diterjemahkan. Sila terjemahkannya:
$5

$6
$7

$8

Pertolongan anda amat dihargai. Para penterjemah seperti anda membantu {{SITENAME}} berfungsi sebagai komuniti berbilang bahasa yang sejati.

Terima kasih!

Penyelaras penterjemahan {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'terjemah kepada $1',
	'translationnotifications-digestemail-subject' => 'E-mel ikhtisar untuk permohonan penterjemahan dari {{SITENAME}}',
	'translationnotifications-digestemail-body' => '$1,

Anda sedang menerima e-mel ini kerana anda telah {{GENDER:$1|mendaftar}} diri sebagai penterjemah ke bahasa $2 di {{SITENAME}}.

Terdapat $3 halaman yang sedia untuk diterjemah. Butiran-butirannya adalah seperti berikut.

$4

Pertolongan anda amat dihargai. Para penterjemah seperti anda membantu {{SITENAME}} berfungsi sebagai komuniti berbilang bahasa yang sejati.

Terima kasih!

Penyelaras penterjemahan {{SITENAME}}

----

Anda menerima e-mel ini kerana anda telah mendaftar untuk menerima e-mel yang berkaitan dengan penterjemahan di {{SITENAME}}. Untuk membatalkan langganan atau menukar tetapan pemberitahuan anda, sila layari <$5>.',
	'translationnotifications-digestemail-notification-line' => 'Pada $1, $2 memohon supaya "$3" diterjemahkannya. Anda boleh menterjemahkannya di $4',
	'translationnotifications-edit-summary' => 'Pemberitahuan penterjemahan: $1',
	'translationnotifications-email-priority' => 'Laman ini diberi prioriti $1.',
	'translationnotifications-email-deadline' => 'Tarikh tutup penterjemahan laman ini ialah $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|menghantar}} pemberitahuan tentang penterjemahan laman $3; {{PLURAL:$10|bahasa|bahasa-bahasa}}: $4; tarikh tutup: $5; keutamaan: $6; dihantar ke $7 penerima, gagal disampaikan kepada $8 penerima, dilangkaunya $9 penerima',
	'log-name-notifytranslators' => 'Pemberitahuan penterjemahan',
	'log-description-notifytranslators' => 'Log pemberitahuan yang dihantar kepada penterjemah tentang laman-laman yang boleh diterjemah',
	'translationnotifications-sent-title' => 'Pemberitahuan penterjemahan dihantar',
	'translationnotifications-sent-body' => 'Pemberitahuan penterjemahan telah dihantar.',
	'translationnotifications-log-alllanguages' => 'semua bahasa',
	'translationnotifications-nodeadline' => 'tiada',
	'translationnotifications-signup-legal' => 'Anda bersetuju bahawa dengan memberikan maklumat ini, kami boleh menghubungi anda berkenaan perihal-perihal yang berkaitan dengan {{SITENAME}} yang kami rasa berkaitan dengan anda. Anda bersetuju bahawa data anda tertakluk pada [[{{MediaWiki:Privacypage}}|dasar privasi]] kami.',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'translationnotifications-info' => 'Informazzjoni dwar l-utent',
	'translationnotifications-username' => 'Isem tal-utent:',
	'translationnotifications-emailstatus' => 'Stat tal-indirizz elettroniku:',
	'translationnotifications-email-confirmed' => 'L-indirizz elettroniku ġie kkonfermat',
	'translationnotifications-email-disablemail' => 'L-indirizz elettroniku ġie kkonfermat, imma fil-[[Special:Preferences|preferenzi tiegħek]] inti tlabt li tirċievi posta elettronika.',
	'translationnotifications-email-unconfirmed' => 'L-indirizz elettroniku ma ġiex ikkonfermat. $1',
	'translationnotifications-email-notset' => "Inti ma pprovdejtx indirizz elettroniku. Tista' tagħmel dan fil-[[Special:Preferences|preferenzi tiegħek]].",
	'translationnotifications-languages' => 'Lingwi',
	'translationnotifications-lang' => 'Lingwa #$1',
	'translationnotifications-nolang' => 'Agħżel lingwa',
	'translationnotifications-contact' => "Metodi ta' kuntatti preferuti",
	'translationnotifications-cmethod-email' => 'Indirizz elettroniku',
	'translationnotifications-cmethod-talkpage' => "Paġna ta' diskussjoni",
	'translationnotifications-cmethod-talkpage-elsewhere' => "Paġna ta' diskussjoni fuq wiki oħra",
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => "Frekwenza ta' kuntatt",
	'translationnotifications-freq-always' => "Meta hemm xi ħaġa ġdida x'tittraduċi",
	'translationnotifications-priority' => 'Prijorità:',
	'translationnotifications-priority-high' => 'għoli',
	'translationnotifications-priority-medium' => 'medju',
	'translationnotifications-priority-low' => 'baxx',
);

/** Norwegian Bokmål (norsk (bokmål)‎)
 */
$messages['nb'] = array(
	'translatorsignup' => 'Registrer deg som oversetter',
	'translatorsignup-summary' => 'Bruk denne siden for å vise hvilke språk du vil oversette til og hvordan du ønsker å bli kontaktet om nye forespørsler.',
	'translationnotifications-desc' => 'Lar oversettere registrere seg for å varsler om nye oversettelsesforespørsler.',
	'translationnotifications-info' => 'Brukerinformasjon',
	'translationnotifications-username' => 'Brukernavn:',
	'translationnotifications-emailstatus' => 'E-poststatus:',
	'translationnotifications-email-confirmed' => 'E-postadressen din er bekreftet',
	'translationnotifications-email-unconfirmed' => 'E-postadressen din er ikke bekreftet. $1',
	'translationnotifications-email-notset' => 'Du har ikke oppgitt noen e-postadresse. Du kan gjøre det i [[Special:Preferences|innstillingene dine]].',
	'translationnotifications-languages' => 'Språk',
	'translationnotifications-lang' => 'Språk nr. $1',
	'translationnotifications-nolang' => 'Velg et språk',
	'translationnotifications-contact' => 'Foretrukne kontaktmetoder',
	'translationnotifications-cmethod-email' => 'E-post',
	'translationnotifications-cmethod-talkpage' => 'Diskusjonsside',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskusjonsside på en annen wiki',
	'translationnotifications-cmethod-feed' => 'Mating',
	'translationnotifications-frequency' => 'Kontaktfrekvens',
	'translationnotifications-freq-always' => 'Når det er noe nytt å oversette',
	'translationnotifications-freq-week' => 'Maks én gang i uka',
	'translationnotifications-freq-month' => 'Maks én gang i måneden',
	'translationnotifications-freq-weekly' => 'Ukentlig sammendrag',
	'translationnotifications-freq-monthly' => 'Månedlig sammendrag',
	'translationnotifications-submit' => 'Registrer deg', # Fuzzy
	'notifytranslators' => 'Varsle oversettere',
	'translationnotifications-submit-ok' => 'Varslene har blitt lagt til i en kø og leveres av en bakgrunnsjobb.',
	'translationnotifications-send-notification-button' => 'Send varsel til oversettere',
	'translationnotifications-deadline-label' => 'Siste frist til å oversette:',
	'translationnotifications-languages-to-notify-label' => 'Hvilke språk som skal få varsel:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kommaseparerte språkkoder; ikke skriv noe for å varsle alle språk.',
	'translationnotifications-priority' => 'Prioritet:',
	'translationnotifications-priority-high' => 'høy',
	'translationnotifications-priority-medium' => 'middels',
	'translationnotifications-priority-low' => 'lav',
	'translationnotifications-priority-unset' => '(ikke satt)',
	'translationnotifications-translatablepage-title' => 'Navn på oversettbar side:',
	'translationnotifications-error-no-translatable-pages' => 'Det er ingen oversettbare sider på denne wikien.',
	'translationnotifications-email-subject' => 'Vennligst oversett siden $1',
	'translationnotifications-email-body' => 'Hei $1,

Du mottar denne e-posten fordi du er meldt på som oversetter til $2 på {{SITENAME}}.

Det er en ny side å oversette der: $3
Vennligst oversett den ved å følge denne lenka:
$4

$5
$6

$7

Takk!
{{SITENAME}}s oversettelsesadministratorer', # Fuzzy
	'translationnotifications-talkpage-body' => 'Hei $2,

Du mottar dette varselet fordi du er påmeldt som oversetter til $3 på {{SITENAME}}.
En ny side, [[$4]], er tilgjengelig for oversettelse. Hjelp til med å oversette den:
$5

$6
$7

$8

Takk!

{{SITENAME}}s oversettelsesadministratorer', # Fuzzy
	'translationnotifications-digestemail-subject' => 'Sammendragsepost for oversettelser på {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hei $1,

Du mottar denne e-posten fordi du er påmeldt som oversetter til $2 på {{SITENAME}}.

Det er {{PLURAL:$3|én side|$3 sider}} tilgjengelig for oversettelse. Detaljene finner du nedenfor.

$4

For å endre varselsinnstillingene dine, gå til <$5>.

Takk!
{{SITENAME}}s oversettelsesadministratorer', # Fuzzy
	'translationnotifications-digestemail-notification-line' => '$2 merket «$3» for oversettelse $1. Du kan oversette den på $4',
	'translationnotifications-edit-summary' => 'Oversettelsesvarsel', # Fuzzy
	'translationnotifications-email-priority' => 'Denne siden har $1 prioritet.',
	'translationnotifications-email-deadline' => 'Tidsfristen for å oversette denne siden er $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|sendte}} et varsel om oversetting av siden $3; språk: $4; tidsfrist: $5; prioritet: $6; sendt til {{PLURAL:$7|én mottaker|$7 mottakere}}, mislyktes for {{PLURAL:$8|én mottaker|$8 mottakere}}, hoppet over for {{PLURAL:$9|én mottaker|$9 mottakere}}', # Fuzzy
	'log-name-notifytranslators' => 'Oversettelsesvarsler',
	'log-description-notifytranslators' => 'En logg over varsler om oversettbare sider sendt til oversettere',
	'translationnotifications-sent-title' => 'Oversettelsesvarsel sendt',
	'translationnotifications-sent-body' => 'Oversettelsesvarsel ble sendt.',
	'translationnotifications-log-alllanguages' => 'alle språk',
	'translationnotifications-nodeadline' => 'ingen',
);

/** Dutch (Nederlands)
 * @author AvatarTeam
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'translatorsignup' => 'Vertalersregistratie',
	'translatorsignup-summary' => 'Gebruik deze pagina om aan te geven in welke talen u kunt vertalen en hoe u wilt dat er contact met u wordt opgenomen als er nieuwe vertaalverzoeken zijn.',
	'translationnotifications-desc' => 'Laat vertalers intekenen voor berichten over vertalingen',
	'translationnotifications-info' => 'Gebruikersgegevens',
	'translationnotifications-username' => 'Gebruikersnaam:',
	'translationnotifications-emailstatus' => 'E-mailadresstatus:',
	'translationnotifications-email-confirmed' => 'Uw e-mailadres is bevestigd',
	'translationnotifications-email-disablemail' => 'Uw e-mailadres is bevestigd, maar in [[Special:Preferences|uw voorkeuren]] hebt u aangegeven geen e-mail te willen ontvangen.',
	'translationnotifications-email-unconfirmed' => 'Uw e-mailadres is niet bevestigd. $1',
	'translationnotifications-email-notset' => 'U hebt geen e-mailadres opgegeven. U kunt dit doen in uw [[Special:Preferences|voorkeuren]].',
	'translationnotifications-languages' => 'Talen',
	'translationnotifications-lang' => 'Taal $1',
	'translationnotifications-nolang' => 'Taal kiezen',
	'translationnotifications-contact' => 'Gewenste contactmethodes',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Overlegpagina',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Overlegpagina op andere wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Contactfrequentie',
	'translationnotifications-freq-always' => 'Wanneer er iets nieuws te vertalen is',
	'translationnotifications-freq-week' => 'Hoogstens één keer per week',
	'translationnotifications-freq-month' => 'Hoogstens één keer per maand',
	'translationnotifications-freq-weekly' => 'Wekelijkse samenvatting',
	'translationnotifications-freq-monthly' => 'Maandelijkse samenvatting',
	'translationnotifications-submit' => 'Instellingen bijwerken',
	'translationnotifications-signup-success' => 'Uw voorkeuren voor meldingen over vertalingen zijn opgeslagen.',
	'notifytranslators' => 'Meldingen voor vertalers',
	'translationnotifications-submit-ok' => 'De meldingen zijn toegevoegd aan een wachtrij en worden via een achtergrondtaak afgeleverd.',
	'translationnotifications-send-notification-button' => 'Stuur een bericht naar vertalers',
	'translationnotifications-deadline-label' => 'Deadline voor deze melding:',
	'translationnotifications-languages-to-notify-label' => 'Voor welke talen een melding gemaakt moet worden:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Komma gescheiden taalcodes; laat leeg om een melding voor alle vertalers te maken.',
	'translationnotifications-priority' => 'Prioriteit:',
	'translationnotifications-priority-high' => 'hoog',
	'translationnotifications-priority-medium' => 'gemiddeld',
	'translationnotifications-priority-low' => 'laag',
	'translationnotifications-priority-unset' => '(niet ingesteld)',
	'translationnotifications-translatablepage-title' => 'Naam vertaalbare pagina:',
	'translationnotifications-error-no-translatable-pages' => "Er zijn geen vertaalbare pagina's in deze wiki.",
	'translationnotifications-email-subject' => 'Vertaal alstublieft de pagina $1',
	'translationnotifications-email-body' => 'Hallo $1,

U ontvangt deze e-mail omdat u zich heeft opgegeven als {{GENDER:$10|vertaler}} voor de {{PLURAL:$9|taal|talen}} $2 op {{SITENAME}}.

Er is een pagina te vertalen: $3.
U kunt deze vertalen door op de volgende koppeling te klikken:
$4

$5
$6

$7

Uw hulp wordt enorm op prijs gesteld. Door vertalers zoals u functioneert {{SITENAME}} als een echte meertalige gemeenschap.

Dank u wel!
Vertalingencoördinatoren van {{SITENAME}}

----

U ontvangt deze e-mail omdat u zich hebt ingeschreven voor het ontvangen van e-mails over over vertalingen op {{SITENAME}}. Ga naar $8 om u uit te schrijven of om uw instellingen aan te passen.',
	'translationnotifications-talkpage-body' => 'Hallo $2,

U ontvangt deze melding omdat u zich heeft opgegeven als {{GENDER:$1|vertaler}} voor {{PLURAL:$9|het|de talen}} $3  op {{SITENAME}}.
De pagina [[$4]] is beschikbaar voor vertaling. Vertaal deze alstublieft hier:
$5

$6
$7

$8

Uw hulp wordt enorm op prijs gesteld. Met vertalers zoals u is {{SITENAME}} een echte meertalige gemeenschap.

Bedankt!

Vertalingenbeheerders van {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'vertalen in het $1',
	'translationnotifications-digestemail-subject' => 'E-mail met samenvatting voor vertaalverzoeken van {{SITENAME}}',
	'translationnotifications-digestemail-body' => "Hallo $1,

U ontvangt deze e-mail omdat u bent ingeschreven als {{GENDER:$1|vertaler}} voor $2 op {{SITENAME}}.

Er {{PLURAL:$3|staat één nieuwe pagina|staan $3 nieuwe pagina's}} ter vertaling. De details zijn hieronder te lezen:

$4

Dank u wel!
Vertalingenbeheerders van {{SITENAME}}

----

U ontvangt deze e-mail omdat u zich hebt ingeschreven voor het ontvangen van e-mails over over vertalingen op {{SITENAME}}. Ga naar <$5> om u uit te schrijven of om uw instellingen aan te passen.",
	'translationnotifications-digestemail-notification-line' => '$2 heeft "$3" op $1 voor vertaling gemarkeerd. U kunt de pagina vertalen via $4',
	'translationnotifications-edit-summary' => 'Melding over vertaling: $1',
	'translationnotifications-email-priority' => 'De prioriteit voor deze pagina is $1.',
	'translationnotifications-email-deadline' => 'De deadline voor het vertalen van deze pagina is $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|heeft}} een melding verzonden voor de vertaalbare pagina $3; {{PLURAL:$10|taal|talen}}: $4; deadline: $5; prioriteit: $6; verzonden aan {{PLURAL:$7|één ontvanger|$7 ontvangers}}, mislukt voor {{PLURAL:$8|één ontvanger|$8 ontvangers}}, overgeslagen voor {{PLURAL:$9|één ontvanger|$9 ontvangers}}',
	'log-name-notifytranslators' => 'Meldingen over vertalingen',
	'log-description-notifytranslators' => "Een logboek van meldingen verzonden naar vertalers over vertaalbare pagina's",
	'translationnotifications-sent-title' => 'De melding aan vertalers is verzonden',
	'translationnotifications-sent-body' => 'De melding aan vertalers is verzonden.',
	'translationnotifications-log-alllanguages' => 'alle talen',
	'translationnotifications-nodeadline' => 'geen',
	'translationnotifications-signup-legal' => 'Door deze gegevens te verstrekken stemt u ermee in dat we contact met u mogen opnemen over onderwerpen over {{SITENAME}} waarvan wij denken dat ze uw interesse hebben. U gaat stemt ermee in dat uw gegevens onder ons [[{{MediaWiki:Privacypage}}|privacybeleid]] vallen.',
);

/** Norwegian Nynorsk (norsk nynorsk)
 * @author Njardarlogar
 */
$messages['nn'] = array(
	'translatorsignup' => 'Omsetjarregistrering',
	'translatorsignup-summary' => 'Nytt denne sida til å visa kva for språk du kan setja om til og korleis du ynskjer å verta kontakta om nye omsetjingsførespurnader.',
	'translationnotifications-desc' => 'Gjev omsetjarar høve til å melda seg på omsetjingsvarsel',
	'translationnotifications-info' => 'Brukarinformasjon',
	'translationnotifications-username' => 'Brukarnamn:',
	'translationnotifications-emailstatus' => 'E-poststode:',
	'translationnotifications-email-confirmed' => 'E-postadressa di er stadfest',
	'translationnotifications-email-disablemail' => 'E-postadressa di er stadfest, men i [[Special:Preferences|innstillingane dine]] har du bede om å ikkje få e-post.',
	'translationnotifications-email-unconfirmed' => 'E-postadressa di er ikkje stadfest. $1',
	'translationnotifications-email-notset' => 'Du har ikkje oppgjeve ei e-postadresse. Du kan gjera dette i [[Special:Preferences|innstillingane dine]].',
	'translationnotifications-languages' => 'Språk',
	'translationnotifications-lang' => 'Språk $1',
	'translationnotifications-nolang' => 'Vel eit språk',
	'translationnotifications-contact' => 'Føretrekte kontaktmetodar',
	'translationnotifications-cmethod-email' => 'E-post',
	'translationnotifications-cmethod-talkpage' => 'Diskusjonsside',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskusjonsside på ein annan wiki',
	'translationnotifications-cmethod-feed' => 'Mating',
	'translationnotifications-frequency' => 'Kontaktfrekvens',
	'translationnotifications-freq-always' => 'Når det er noko nytt å setja om',
	'translationnotifications-freq-week' => 'Høgst éin gong i veka',
	'translationnotifications-freq-month' => 'Høgst éin gong i månaden',
	'translationnotifications-freq-weekly' => 'Vekessamandrag',
	'translationnotifications-freq-monthly' => 'Månadssamandrag',
	'translationnotifications-submit' => 'Oppdater innstillingane',
	'translationnotifications-signup-success' => 'Omsetjingsinnstillingane dine vart lagra.',
	'notifytranslators' => 'Varsla omsetjarar',
	'translationnotifications-priority' => 'Prioritet:',
	'translationnotifications-priority-high' => 'høg',
	'translationnotifications-priority-medium' => 'medels',
	'translationnotifications-priority-low' => 'låg',
	'translationnotifications-priority-unset' => '(ikkje sett)',
	'translationnotifications-translatablepage-title' => 'Namnet på side som kan setjast om:',
	'translationnotifications-error-no-translatable-pages' => 'Det finst ingen sider på wikien som kan setjast om.',
	'translationnotifications-email-subject' => 'Gjer vel å setja om sida $1',
	'translationnotifications-talkpage-body' => 'Hei $2,

Du mottek dette varselet av di du {{GENDER:$1|melde deg på}} som omsetjar {{PLURAL:$9|for}} $3 på {{SITENAME}}.
Sida [[$4]] er tilgjengeleg for omsetjing. Du kan setja henne om her:
$5

$6
$7

$8

Hjelpa di er høgt verdsett. Omsetjarar som deg hjelper {{SITENAME}} med å fungera som ein sann mangspråkleg fellesskap.

Takk!

Omsetjingskoordinatorane for {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'set om til $1',
	'translationnotifications-edit-summary' => 'Omsetjingsvarsel: $1',
	'translationnotifications-email-priority' => 'Sida har $1 prioritet.',
	'translationnotifications-email-deadline' => 'Fristen for å setja om sida er $1.',
	'log-name-notifytranslators' => 'Omsetjingsvarsel',
	'log-description-notifytranslators' => 'Ein logg over varsel sende til omsetjarar om omsetbare sider',
	'translationnotifications-sent-title' => 'Omsetjingsvarselet er sendt',
	'translationnotifications-sent-body' => 'Omsetjingsvarsel vart sendt',
	'translationnotifications-log-alllanguages' => 'alle språk',
	'translationnotifications-nodeadline' => 'ingen',
	'translationnotifications-signup-legal' => 'Du samtykkjer i at ved å gje opp denne informasjonen kan me kontakta deg om emne relaterte til {{SITENAME}} som me trur kan vera av interesse for deg. Du samtykkjer i at dataa dine er underlagde [[{{MediaWiki:Privacypage}}|retningslinene våre for personvern]].',
);

/** Pälzisch (Pälzisch)
 * @author Manuae
 */
$messages['pfl'] = array(
	'translatorsignup' => 'Iwasedza Oameldung',
	'translatorsignup-summary' => 'Konschd uffde Said die Schbrooche oagewe, wu babble dudsch un wie fa Iwasedzunge oagfrochd werre wilschd.',
	'translationnotifications-desc' => 'Eameschlischdm Iwasedza Nochrischde fas Iwasedze zu bschdelle',
	'translationnotifications-info' => 'Benudza-Auskinfd',
	'translationnotifications-username' => 'Benudzanoame:',
	'translationnotifications-emailstatus' => 'E-Mail-Status:',
	'translationnotifications-email-confirmed' => 'Doi E-Mail-Adress isch bschdedischd',
	'translationnotifications-email-disablemail' => 'Doi E-Mail-Adress isch bschdedischd, awa in [[Special:Preferences|doine Oischdellunge]] hoschd gsachd, daskä E-Mail krische wilschd.',
	'translationnotifications-email-unconfirmed' => 'Doi E-Mail-Adress isch ned bschdedischd. $1',
	'translationnotifications-email-notset' => 'Du hoschd kä E-Mail-Adress oagewe. Konschds in doine [[Special:Preferences|Oischdellunge]] mache.',
	'translationnotifications-languages' => 'Schbrooche',
	'translationnotifications-lang' => 'Schbrooch Nr. $1',
	'translationnotifications-nolang' => 'Ä Schbrooch wehle',
	'translationnotifications-contact' => 'Gwinschde Aade fa Nochrischde zu grische',
	'translationnotifications-cmethod-email' => 'E-Mail',
	'translationnotifications-cmethod-talkpage' => 'Dischbediersaid',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Dischbediersaid uffm oanare Wiki',
	'translationnotifications-cmethod-feed' => 'Oigaab',
	'translationnotifications-frequency' => 'Haifischkaid vunde Nochrichde',
	'translationnotifications-freq-always' => 'Wons was naies fas Iwasedze hod',
	'translationnotifications-freq-week' => 'Hegschdens ämol inde Woch',
	'translationnotifications-freq-month' => 'Hegschdens ämol im Monad',
	'translationnotifications-freq-weekly' => 'Weschndlischi Iwasischd',
	'translationnotifications-freq-monthly' => 'Monadlischi Iwasischd',
	'translationnotifications-submit' => 'Oamelde', # Fuzzy
	'notifytranslators' => 'Iwasedza bnochrischdische',
	'translationnotifications-submit-ok' => 'Die Bnochrischdischung fas Iwasedze isch inäner Wardeschlong un wead vunäm Hinagrunduffdraach vaschiggd.',
	'translationnotifications-send-notification-button' => 'Ä Bnochrischdischung zude Iwasedza schigge',
	'translationnotifications-deadline-label' => 'Frischd fadie Bnochrischdischung hiewaise:',
	'translationnotifications-languages-to-notify-label' => 'Die Schbrooch zum bnochrischdische:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Midm Komma gdrennde Schbroochcode; fas Bnochrischdische inde Schbrooche frai losse.',
	'translationnotifications-priority' => 'Wischdischkaid:',
	'translationnotifications-priority-high' => 'hoch',
	'translationnotifications-priority-medium' => 'middl',
	'translationnotifications-priority-low' => 'niedrisch',
	'translationnotifications-priority-unset' => '(ned gsedzd)',
	'translationnotifications-translatablepage-title' => 'Noame vunde Said, wu iwasedzd werre soll:',
	'translationnotifications-error-no-translatable-pages' => "S'hod kä Saide zu iwasedze uff dem Wiki.",
	'translationnotifications-email-subject' => 'Iwasedz bidde die Said $1.',
	'translationnotifications-email-body' => 'Hey $1,

du grigschd die E-Mail wail disch als Iwasedza fa $2 uff {{SITENAME}} oigdraache hoschd.

Oan der Schdell isch ä naiji Said fas Iwasedze do: $3.
Iwasedzse bidde nochm Drigge uff:
$4

$5
$6

$7

Dongschä,
die Midawaida vun {{SITENAME}}', # Fuzzy
	'translationnotifications-talkpage-body' => 'Hey $2,

du grigschd die E-Mail wail disch als Iwasedza fa $3 uff {{SITENAME}} oigdraache hoschd.
Ä naiji Said [[$4]] isch fas Iwasedze do. Bidde iwasedze:
$5

$6
$7

$8

Dongschä,
die Midawaida vun {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'iwasedze uff $1',
	'translationnotifications-digestemail-subject' => 'Lischd vun E-Mail fa Uffdräch fas Iwasedze vun {{SITENAME}}',
	'translationnotifications-digestemail-body' => "Hey $1,

du grigschd die E-Mail wail disch als Iwasedza fa $2 uff {{SITENAME}} oigdraache hoschd.

{{PLURAL:$3|S'isch ä Said|Sin $3 Saide}} fas Iwasedze do. Näjares finschd unne:

$4

Um doi Oischdellunge fa Bnochrischdischunge fas Iwasedze zu änare, konschd <$5> uffsuche.

Dongschä,
die Midawaida vun {{SITENAME}}", # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Oam $1 hod $2 die Said „$3“ fas Iwasedze frai gewe. Du konnschdse una $4 Iwasedze.',
	'translationnotifications-edit-summary' => 'Iwasedzungsnochrichd', # Fuzzy
	'translationnotifications-email-priority' => 'Die Wischdischkaid vunde Said fas Iwasedze isch $1.',
	'translationnotifications-email-deadline' => 'Die Frischd fas Iwasedze vunde Said laafd bis zum $1.',
	'logentry-translationnotifications-sent' => "$1 hod ä Nochrischd fa die Iwasedzung vunde Said $3 inde Schbrooche $4 midde Frischd $5 unde Dringlischkaid $6, mid Eafolsch {{PLURAL:$7|oanen|oan $7}} Embfenga un ohne Eafolsch {{PLURAL:$8|oanen|oan $8}} Embfenga {{GENDER:$2|gschiggd}}, {{PLURAL:$9|un'es ischn|un'esin $9}} Embfenga ned oagschriwwe worre.", # Fuzzy
	'log-name-notifytranslators' => 'Iwasedzungsnochrichde-Logbuch',
	'log-description-notifytranslators' => "S'Logbuch vun Bnochrischdischunge, wu oan Iwasedza fas Iwasedze vun Saide gonge sin.",
	'translationnotifications-sent-title' => 'Iwasedzungsnochrichd gschigd',
	'translationnotifications-sent-body' => 'Iwasedzungsnochrichd isch gschigd worre',
	'translationnotifications-log-alllanguages' => 'alli Schbrooche',
	'translationnotifications-nodeadline' => 'nix',
);

/** Polish (polski)
 * @author Ankry
 * @author BeginaFelicysym
 * @author Odie2
 * @author Woytecr
 */
$messages['pl'] = array(
	'translatorsignup' => 'Rejestracja tłumacza',
	'translatorsignup-summary' => 'Użyj tej strony, aby wskazać, jakie języki możesz tłumaczyć w i w jaki sposób mamy się z Tobą kontaktować w sprawie nowych tłumaczeń.',
	'translationnotifications-desc' => 'Umożliwia zarejestrowanie się przez tłumaczy aby otrzymywać powiadomienia na temat tłumaczeń',
	'translationnotifications-info' => 'Informacje o użytkowniku',
	'translationnotifications-username' => 'Nazwa użytkownika:',
	'translationnotifications-emailstatus' => 'Stan e-mail:',
	'translationnotifications-email-confirmed' => 'Twój adres e-mail jest potwierdzony',
	'translationnotifications-email-disablemail' => 'Twój adres e-mail został potwierdzony, ale w [[Special:Preferences|preferencjach]] zaznaczono brak pozwolenia na przesyłanie wiadomości e-mail.',
	'translationnotifications-email-unconfirmed' => 'Twój adres e-mail nie jest potwierdzony. $1',
	'translationnotifications-email-notset' => 'Nie podano adresu e-mail. Można to zrobić w [[Special:Preferences|preferencjach]].',
	'translationnotifications-languages' => 'Języki',
	'translationnotifications-lang' => 'Język #$1',
	'translationnotifications-nolang' => 'Wybierz język',
	'translationnotifications-contact' => 'Preferowane sposoby kontaktu',
	'translationnotifications-cmethod-email' => 'E‐mail',
	'translationnotifications-cmethod-talkpage' => 'Strona dyskusji',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Strona dyskusji na innej wiki',
	'translationnotifications-cmethod-feed' => 'Kanały',
	'translationnotifications-frequency' => 'Częstotliwość kontaktów',
	'translationnotifications-freq-always' => 'Gdy istnieje coś nowego do przetłumaczenia',
	'translationnotifications-freq-week' => 'Co najwyżej raz w tygodniu',
	'translationnotifications-freq-month' => 'Co najwyżej raz w miesiącu',
	'translationnotifications-freq-weekly' => 'Tygodniowe streszczenie',
	'translationnotifications-freq-monthly' => 'Miesięczne streszczenie',
	'translationnotifications-submit' => 'Ustawienia aktualizacji',
	'translationnotifications-signup-success' => 'Twoje preferencje powiadomień o tłumaczeniach zostały zapisane.',
	'notifytranslators' => 'Powiadom tłumaczy',
	'translationnotifications-submit-ok' => 'Powiadomienia zostały dodane do kolejki i są dostarczane przez zadanie w tle.',
	'translationnotifications-send-notification-button' => 'Wyślij powiadomienia do tłumaczy',
	'translationnotifications-deadline-label' => 'Termin do wskazania w tym powiadomieniu:',
	'translationnotifications-languages-to-notify-label' => 'Jakie języki powiadomić:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Kody języków oddzielone przecinkami; pozostaw puste by powiadamiać dla wszystkich języków.',
	'translationnotifications-priority' => 'Priorytet:',
	'translationnotifications-priority-high' => 'wysoki',
	'translationnotifications-priority-medium' => 'średni',
	'translationnotifications-priority-low' => 'niski',
	'translationnotifications-priority-unset' => '(nieustawiony)',
	'translationnotifications-translatablepage-title' => 'Nazwa strony do przetłumaczenia:',
	'translationnotifications-error-no-translatable-pages' => 'Nie ma stron do przetłumaczenia na tej wiki.',
	'translationnotifications-email-subject' => 'Przetłumacz stronę $1',
	'translationnotifications-email-body' => 'Witaj  $1,

Otrzymujesz tę wiadomość e-mail, ponieważ użytkownik zarejestrował się jako tłumacz portalu {{SITENAME}} na  $2.

Jest nowa strona do tłumaczenia:  $3 .
Przetłumacz ją klikając poniższe łącze:
$4

$5
$6

$7

Dziękujemy!
Zespół {{SITENAME}}

----

Otrzymujesz tę wiadomość e-mail, ponieważ ten użytkownik zgodził się otrzymywać e-maile związane z tłumaczeniami portalu {{SITENAME}}.
Aby anulować subskrypcję lub zmienić swoje preferencje powiadamiania o tłumaczeniach, odwiedź $8', # Fuzzy
	'translationnotifications-talkpage-body' => 'Witaj $2,

Otrzymałeś to powiadomienie, ponieważ dostałeś uprawnienia do tłumaczenia {{PLURAL:$9|języku}} $3 na {{SITENAME}}.
Teraz możesz tłumaczyć stronę [[$4]]. Możesz to przetłumaczyć tutaj:
$5

$6
$7

$8

Twoja pomoc jest bardzo mile widziana. Tłumacze pomogą stronie {{SITENAME}} stworzyć wielojęzyczną społeczność.

Dziękujemy!

Koordynator tłumaczeń {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'przetłumacz na $1',
	'translationnotifications-digestemail-subject' => 'Wiadomość ze streszczeniem próśb o tłumaczenie z witryny {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Witaj $1,

Otrzymujesz ten e-mail ponieważ zarejestrowałeś się jako tłumacz na $2 na stronie {{SITENAME}}.

{{PLURAL:$3|Jest dostępna jedna strona|Są dostępne $3 strony|Jest dostępnych $3 stron}} do przetłumaczenia. Szczegóły podane są niżej.

$4

Twoja pomoc jest wielce pożądana. Tłumacze, tacy jak ty, pomagają {{SITENAME}} działać jako naprawdę wielojęzykowej społeczności.

Dziękujemy!
Administratorzy tłumaczeń {{SITENAME}}

----

Otrzymujesz ten e-mail ponieważ zarejestrowałeś się aby otrzymywać e-maile dotyczące tłumaczeń na {{SITENAME}}. Aby wypisać się ze subskrypcji lub zmienić preferencje powiadomień, odwiedź stronę <$5>', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Dnia $1, $2 oznaczył "$3" jako do przetłumaczenia. Można tłumaczyć stronę na $4.',
	'translationnotifications-edit-summary' => 'Powiadomienie o tłumaczeniu: $1',
	'translationnotifications-email-priority' => 'Priorytet tej strony to  $1 .',
	'translationnotifications-email-deadline' => 'Nieprzekraczalny termin tłumaczenia tej strony to $1 .',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|wysyłał|wysłała}} powiadomienie w sprawie tłumaczenia strony $3; języki: $4; termin $5; priorytet $6; do {{PLURAL:$7|jednego adresata|$7 adresatów}} pomyślnie, do {{PLURAL:$8|jednego adresata|$8 adresatów}} bezskutecznie, pominięto {{PLURAL:$9|jednego adresata|$9 adresatów}}', # Fuzzy
	'log-name-notifytranslators' => 'Powiadomienia o tłumaczeniach',
	'log-description-notifytranslators' => 'Dziennik powiadomień wysyłanych do tłumaczy o stronach do przetłumaczenia',
	'translationnotifications-sent-title' => 'Wysłano powiadomienie tłumaczenia',
	'translationnotifications-sent-body' => 'Powiadomienie o tłumaczeniu zostało wysłane.',
	'translationnotifications-log-alllanguages' => 'wszystkie języki',
	'translationnotifications-nodeadline' => 'brak',
	'translationnotifications-signup-legal' => 'Dostarczając te informacje, użytkownik zgadzasz się z tym, że możemy skontaktować się z tobą w tematami związanymi ze stroną {{SITENAME}}, które naszym zdaniem mogą być dla ciebie interesujące. Zgadzasz się, również z tym, że Twoje dane osobowe będą przetwarzane zgodnie z naszymi [[{{MediaWiki:Privacypage}}|zasadami]].',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 * @author පසිඳු කාවින්ද
 */
$messages['pms'] = array(
	'translatorsignup' => 'Iscrission al tradutor',
	'translatorsignup-summary' => "Ch'a deuvra costa pàgina për andiché an che lenga a peul volté, e com a veul esse contatà a propòsit ëd le neuve arceste ëd tradussion.",
	'translationnotifications-desc' => 'A përmët ai tradutor ëd marchesse për dle notìfiche ëd tradussion',
	'translationnotifications-info' => "Anformassion an sl'utent",
	'translationnotifications-username' => 'Stranòm:',
	'translationnotifications-emailstatus' => 'Stat ëd la pòsta eletrònica:',
	'translationnotifications-email-confirmed' => "Toa adrëssa ëd pòsta eletrònica a l'é confirmà",
	'translationnotifications-email-disablemail' => "Soa adrëssa ëd pòsta eletrònica a l'é confirmà, ma ant ij [[Special:Preferences|sò gust]] a l'ha ciamà d'arsèive gnun mëssagi.",
	'translationnotifications-email-unconfirmed' => "Toa adrëssa ëd pòsta eletrònica a l'é pa confirmà. $1",
	'translationnotifications-email-notset' => "A l'ha pa fornì n'adrëssa ëd pòsta eletrònica. A peule felo ant ij sò [[Special:Preferences|gust]].",
	'translationnotifications-languages' => 'Lenghe',
	'translationnotifications-lang' => 'Lenga #$1',
	'translationnotifications-nolang' => 'Sern na lenga',
	'translationnotifications-contact' => 'Métod ëd contat preferì',
	'translationnotifications-cmethod-email' => 'Pòsta eletrònica',
	'translationnotifications-cmethod-talkpage' => 'Pàgina ëd discussion',
	'translationnotifications-cmethod-talkpage-elsewhere' => "Pàgina ëd discussion ansima a n'àutra wiki",
	'translationnotifications-cmethod-feed' => 'Fluss',
	'translationnotifications-frequency' => 'Frequensa ëd contat',
	'translationnotifications-freq-always' => 'Quand a-i é quaicòs ëd neuv da volté',
	'translationnotifications-freq-week' => 'Al pi na vira a la sman-a',
	'translationnotifications-freq-month' => 'Al pi na vira al mèis',
	'translationnotifications-freq-weekly' => 'Resumé ebdomadari',
	'translationnotifications-freq-monthly' => 'Resumé mensil',
	'translationnotifications-submit' => "Paràmeter d'agiornament",
	'translationnotifications-signup-success' => 'Ij tò gust ëd notìfica ëd tradussion a son stàit salvà.',
	'notifytranslators' => 'Anformé ij tradutor',
	'translationnotifications-submit-ok' => 'Dle notìfiche a son stàite giontà a na coa e a son consignà da un process dë sfond.',
	'translationnotifications-send-notification-button' => 'Manda na notìfica ai tradutor',
	'translationnotifications-deadline-label' => 'Fin da andiché an sta notìfica:',
	'translationnotifications-languages-to-notify-label' => 'Che lenghe notifiché:',
	'translationnotifications-languages-to-notify-label-help-message' => "Còdes ëd lenga separà da dle vìrgole; ch'a lassa veuid për notifiché tute le lenghe.",
	'translationnotifications-priority' => 'Priorità:',
	'translationnotifications-priority-high' => 'àut',
	'translationnotifications-priority-medium' => 'mesan-a',
	'translationnotifications-priority-low' => 'bass',
	'translationnotifications-priority-unset' => '(disativà)',
	'translationnotifications-translatablepage-title' => 'Nòm ëd la pàgina da volté:',
	'translationnotifications-error-no-translatable-pages' => 'A-i son gnun-e pàgine da volté an costa wiki.',
	'translationnotifications-email-subject' => "Për piasì, ch'a vòlta la pàgina $1.",
	'translationnotifications-email-body' => "Cerea $1,

A arsèiv ës mëssagi përché {{GENDER:$10|a l'é marcasse}} com tradutor {{PLURAL:$9|a}} $2 dzor {{SITENAME}}.

A-i é na pagina da volté ambelessì: $3.
A peul voltela an sgnacand ansima a costa liura:
$4

$5
$6

$7

Sò agiut a l'é motobin apressià. Ij tradutor com chiel a giuto {{SITENAME}} a marcé
com na comunità multilenga për da bon.

Mersì!
Ij coordinator ëd tradussion ëd {{SITENAME}}

----

A arsèiv ëd mëssagi përchè a l'é marcasse për arsèive dij mëssagi relativ a le tradussion dzor {{SITENAME}}. Për scancelé soa anscrission o për cangé ij sò gust ëd notìfica, për piasì ch'a vìsita $8.",
	'translationnotifications-talkpage-body' => "Cerea $2,

A arsèiv sta notìfica përché {{GENDER:$1|a l'é marcasse}} com tradutor {{PLURAL:$9|a}} $3 dzor {{SITENAME}}.
La pàgina [[$4]] a l'é disponìbil për la tradussion. A peul voltela ambelessì:
$5

$6
$7

$8

Sò agiut a l'é motobin apressià. Dij tradutor com chiel a giuto {{SITENAME}} a marcé
com na comunità multilenga për da bon.

Mersì!

Ij coordinator ëd la tradussion ëd {{SITENAME}}",
	'translationnotifications-notification-url-listitem' => 'vòlta an $1',
	'translationnotifications-digestemail-subject' => "Mëssagi ëd sìntesi për j'arceste ëd tradussion da {{SITENAME}}",
	'translationnotifications-digestemail-body' => "Cerea $1,

A arsèiv ës mëssagi përché {{GENDER:$1|a l'é marcasse}} com tradutor an $2 dzor {{SITENAME}}.

A-i {{PLURAL:$3|é 1 pàgina|son $3 pàgine}} disponìbij për la tradussion.
Ij detaj a son dàit sì-sota.

$4

Sò agiut a l'é motobin apressià. Dij tradutor com chiel a giuto {{SITENAME}} a marcé
com na comunità multilenga për da bon.

Mersì!
Ij coordinator ëd la tradussion ëd {{SITENAME}}

----

A arsèiv ës mëssagi përchè a l'é marcasse për arsèive dij mëssagi relativ a le tradussion dzor {{SITENAME}}. Për scancelé soa anscrission o për cangé ij sò gust ëd notìfica për le tradussion, për piasì ch'a vìsita <$5>.",
	'translationnotifications-digestemail-notification-line' => "Ël $1, $2 a l'ha marcà «$3» për la tradussion. A peul voltelo a $4",
	'translationnotifications-edit-summary' => 'Notìfiche ëd tradussion: $1',
	'translationnotifications-email-priority' => "La priorità dë sta pàgina a l'é $1.",
	'translationnotifications-email-deadline' => "La scadensa për volté sta pàgina a l'é $1.",
	'logentry-translationnotifications-sent' => "$1 {{GENDER:$2|a l'ha mandà}} na notìfica an sla tradussion ëd la pàgina $3; {{PLURAL:$1|lenga|lenghe}}: $4; scadensa: $5; priorità: $6; mandà a {{PLURAL:$7|un destinatari|$7 destinatari}}, falì për {{PLURAL:$8|un destinatari|$8 destinatari}}, sautà për {{PLURAL:$9|un destinatari|$9 destinatari}}", # Fuzzy
	'log-name-notifytranslators' => 'Notìfiche ëd tradussion',
	'log-description-notifytranslators' => 'Un registr ëd le notìfiche mandà ai tradutor a propòsit ëd le pàgine da volté',
	'translationnotifications-sent-title' => 'Notìfica ëd tradussion mandà',
	'translationnotifications-sent-body' => "La notìfica ëd tradussion a l'é stàita mandà.",
	'translationnotifications-log-alllanguages' => 'tute le lenghe',
	'translationnotifications-nodeadline' => 'gnun',
	'translationnotifications-signup-legal' => "A l'é d'acòrdi che an dasend costa anformassion noi podoma contatelo a propòsit dj'argoment relativ a {{SITENAME}} che noi pensoma a peulo esse d'anteresse për chiel. A l'é d'acòrdi che ij sò dat a sio sogetà a nòstre [[{{MediaWiki:Privacypage}}|régole ëd confidensialità]].",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'translationnotifications-username' => 'کارن-نوم:',
	'translationnotifications-emailstatus' => 'د برېښليک دريځ:',
	'translationnotifications-languages' => 'ژبې',
	'translationnotifications-lang' => 'ژبه #$1',
	'translationnotifications-nolang' => 'يوه ژبه وټاکۍ',
	'translationnotifications-cmethod-email' => 'برېښليک',
	'translationnotifications-cmethod-talkpage' => 'د خبرواترو مخ',
	'translationnotifications-priority' => 'لومړيتوب:',
	'translationnotifications-notification-url-listitem' => '$1 ته ژباړل',
	'translationnotifications-log-alllanguages' => 'ټولې ژبې',
	'translationnotifications-nodeadline' => 'هېڅ',
);

/** Portuguese (português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'translationnotifications-email-deadline' => 'A data limite para traduzir esta página é $1.',
);

/** Brazilian Portuguese (português do Brasil)
 * @author 555
 */
$messages['pt-br'] = array(
	'translatorsignup' => 'Inscrição como tradutor',
	'translatorsignup-summary' => 'Use esta página para indicar quais são os idiomas em que você pode realizar traduções e a forma que de contato preferencial para ser avisado de novos pedidos de tradução.',
	'translationnotifications-desc' => 'Permite que tradutores se inscrevam para receber notificações de novos materiais a traduzir',
	'translationnotifications-info' => 'Informação sobre o usuário',
	'translationnotifications-username' => 'Nome de usuário:',
	'translationnotifications-emailstatus' => 'Status do e-mail:',
	'translationnotifications-email-confirmed' => 'Seu endereço de e-mail já está confirmado',
	'translationnotifications-email-disablemail' => 'Seu endereço de e-mail já está confirmado, mas, em [[Special:Preferences|suas preferências]], está definido para não receber mensagens de e-mail.',
	'translationnotifications-email-unconfirmed' => 'Seu endereço de e-mail não está confirmado. $1',
	'translationnotifications-email-notset' => 'Você não tem um endereço de e-mail especificado. É possível fazer isso nas [[Special:Preferences|suas preferências]].',
	'translationnotifications-languages' => 'Idiomas',
	'translationnotifications-lang' => 'Idioma $1',
	'translationnotifications-nolang' => 'Escolha um idioma',
	'translationnotifications-contact' => 'Forma de contato preferencial',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Página de discussão',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Página de discussão em outro wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Freqüência de contato',
	'translationnotifications-freq-always' => 'Sempre que houver algo novo para traduzir',
	'translationnotifications-freq-week' => 'No máximo uma vez por semana',
	'translationnotifications-freq-month' => 'No máximo uma vez por mês',
	'translationnotifications-freq-weekly' => 'Resumo semanal',
	'translationnotifications-freq-monthly' => 'Resumo mensal',
	'translationnotifications-submit' => 'Atualizar configurações',
	'translationnotifications-signup-success' => 'As suas preferências de notificação de traduções foram salvas.',
	'notifytranslators' => 'Notificar tradutores',
	'translationnotifications-submit-ok' => 'As notificações foram adicionadas em uma fila de sistema e serão entregues por um processo executado em segundo plano.',
	'translationnotifications-send-notification-button' => 'Enviar notificação para os tradutores',
	'translationnotifications-deadline-label' => 'Prazo a ser indicado nesta notificação:',
	'translationnotifications-languages-to-notify-label' => 'Notificar em quais idiomas:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Códigos de idiomas separados por vírgulas. Deixe em branco para notificar todos os idiomas disponíveis.',
	'translationnotifications-priority' => 'Prioridade:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'média',
	'translationnotifications-priority-low' => 'baixa',
	'translationnotifications-priority-unset' => '(indefinida)',
	'translationnotifications-translatablepage-title' => 'Nome da página traduzível:',
	'translationnotifications-error-no-translatable-pages' => 'Não há, neste momento, páginas traduzíveis neste wiki.',
	'translationnotifications-email-subject' => 'Ajude-nos traduzindo a página $1',
	'translationnotifications-notification-url-listitem' => 'traduzir em $1',
	'translationnotifications-digestemail-subject' => 'Resumo das solicitações de tradução do wiki {{SITENAME}}',
	'translationnotifications-digestemail-notification-line' => 'Em $1, $2 marcou a página "$3" para tradução. Você pode traduzi-la a partir do link $4',
	'translationnotifications-edit-summary' => 'Notificação de tradução: $1',
	'translationnotifications-email-priority' => 'A prioridade para esta página é $1.',
	'translationnotifications-email-deadline' => 'O prazo para que esta página receba traduções é $1.',
	'log-name-notifytranslators' => 'Notificações de tradução',
);

/** Romanian (română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'translationnotifications-info' => 'Informații despre utilizator',
	'translationnotifications-username' => 'Nume de utilizator:',
	'translationnotifications-emailstatus' => 'Starea e-mailului:',
	'translationnotifications-email-confirmed' => 'Adresa dumneavoastră de e-mail este confirmată',
	'translationnotifications-email-disablemail' => 'Adresa dumneavoastră de e-mail este confirmată, dar în [[Special:Preferences|preferințele dumneavoastră]] ați cerut să nu primiți e-mailuri.',
	'translationnotifications-email-unconfirmed' => 'Adresa dumneavoastră de e-mail nu este confirmată. $1',
	'translationnotifications-email-notset' => 'Nu ați introdus o adresă de e-mail. Puteți face acest lucru în [[Special:Preferences|preferințele]] dumneavoastră.',
	'translationnotifications-languages' => 'Limbi',
	'translationnotifications-lang' => 'Limba #$1',
	'translationnotifications-nolang' => 'Alegeți o limbă',
	'translationnotifications-contact' => 'Metodele de contact preferate',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Pagină de discuții',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pagină de discuții pe alt wiki',
	'translationnotifications-frequency' => 'Frecvența de contact',
	'translationnotifications-freq-always' => 'Atunci când este ceva nou de tradus',
	'translationnotifications-freq-week' => 'Ce mult o dată pe săptămână',
	'translationnotifications-freq-month' => 'Cel mult o dată pe lună',
	'translationnotifications-freq-weekly' => 'Rezumat săptămânal',
	'translationnotifications-freq-monthly' => 'Rezumat lunar',
	'translationnotifications-submit' => 'Actualizați setările',
	'translationnotifications-signup-success' => 'Preferințele dumneavoastră de notificare au fost salvate.',
	'notifytranslators' => 'Informați traducătorii',
	'translationnotifications-languages-to-notify-label' => 'Ce limbi să fie notificate:',
	'translationnotifications-priority' => 'Prioritate:',
	'translationnotifications-priority-high' => 'mare',
	'translationnotifications-priority-medium' => 'medie',
	'translationnotifications-priority-low' => 'mică',
	'translationnotifications-priority-unset' => '(nesetată)',
	'translationnotifications-translatablepage-title' => 'Numele paginii de tradus:',
	'translationnotifications-error-no-translatable-pages' => 'Nu există pagini de tradus pe acest wiki.',
	'translationnotifications-email-subject' => 'Vă rugăm să traduceți pagina $1',
	'translationnotifications-edit-summary' => 'Notificare de traducere: $1',
	'translationnotifications-email-priority' => 'Prioritatea acestei pagini este $1.',
	'translationnotifications-log-alllanguages' => 'toate limbile',
	'translationnotifications-nodeadline' => 'niciuna',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'translationnotifications-info' => "'Mbormaziune de l'utende",
	'translationnotifications-username' => "Nome de l'utende:",
	'translationnotifications-emailstatus' => "State d'a mail:",
	'translationnotifications-languages' => 'Lènghe',
	'translationnotifications-lang' => 'Lénghe #$1',
	'translationnotifications-nolang' => "Scacchie 'na lènghe",
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => "Pàgene de le 'ngazzaminde",
);

/** Russian (русский)
 * @author Kaganer
 */
$messages['ru'] = array(
	'translatorsignup' => 'Регистрация в качестве переводчика',
	'translatorsignup-summary' => 'Эта страница позволяет указать языки, на которые вы можете переводить, а также способы связи с вами, по которым вы хотите получать уведомления о новых запросах на перевод.',
	'translationnotifications-desc' => 'Позволяет переводчикам зарегистрироваться для получения уведомлений, связанных с переводами',
	'translationnotifications-info' => 'Информация об участнике',
	'translationnotifications-username' => 'Имя учётной записи :',
	'translationnotifications-emailstatus' => 'Статус адреса эл. почты:',
	'translationnotifications-email-confirmed' => 'Ваш адрес электронной почты подтверждён',
	'translationnotifications-email-disablemail' => 'Ваш адрес электронной почты подтверждён, но в ваших [[Special:Preferences|персональных настройках]] не включёна опция, разрешающая другим присылать вам сообщения на этот адрес.',
	'translationnotifications-email-unconfirmed' => 'Ваш адрес электронной почты не подтверждён. $1',
	'translationnotifications-email-notset' => 'Вы не указали адрес электронной почты. Вы можете сделать это в своих [[Special:Preferences|персональных настройках]].',
	'translationnotifications-languages' => 'Языки',
	'translationnotifications-lang' => 'Язык № $1',
	'translationnotifications-nolang' => 'Выберите язык',
	'translationnotifications-contact' => 'Предпочтительные способы связи',
	'translationnotifications-cmethod-email' => 'Электронная почта',
	'translationnotifications-cmethod-talkpage' => 'Страница обсуждения',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Страница обсуждения в другом вики-проекте',
	'translationnotifications-cmethod-feed' => 'Лента (feed)',
	'translationnotifications-frequency' => 'Периодичность связи',
	'translationnotifications-freq-always' => 'Как только появляется что-то новое для перевода',
	'translationnotifications-freq-week' => 'Не чаще одного раза в неделю',
	'translationnotifications-freq-month' => 'Не чаще одного раза в месяц',
	'translationnotifications-freq-weekly' => 'Еженедельный дайджест',
	'translationnotifications-freq-monthly' => 'Ежемесячный дайджест',
	'translationnotifications-submit' => 'Обновить настройки',
	'translationnotifications-signup-success' => 'Ваши настройки уведомлений о переводах сохранены.',
	'notifytranslators' => 'Уведомить переводчиков',
	'translationnotifications-submit-ok' => 'Уведомления были добавлены в очередь и отправляются в фоновом режиме.',
	'translationnotifications-send-notification-button' => 'Отправить переводчикам уведомление',
	'translationnotifications-deadline-label' => 'Крайний срок, указываемый в этом уведомлении:',
	'translationnotifications-languages-to-notify-label' => 'К каким языкам относится уведомление:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Коды языков, разделяемые запятой; оставьте поле пустым, если уведомление касается всех языков.',
	'translationnotifications-priority' => 'Приоритет:',
	'translationnotifications-priority-high' => 'высокий',
	'translationnotifications-priority-medium' => 'средний',
	'translationnotifications-priority-low' => 'низкий',
	'translationnotifications-priority-unset' => '(не задан)',
	'translationnotifications-translatablepage-title' => 'Имя переводимой страницы:',
	'translationnotifications-error-no-translatable-pages' => 'В этом вики-проекте нет доступных для перевода страниц.',
	'translationnotifications-email-subject' => 'Переведите, пожалуйста, страницу $1',
	'translationnotifications-email-body' => 'Здравствуйте, $1!

Вы получили это письмо, так как зарегистрировались на сайте {{SITENAME}} в качестве переводчика на следующий язык: $2.

Вот новая страница, требующая перевода:  $3.
Пожалуйста переведите её, нажав на следующую ссылку:
$4

$5
$6

$7

Спасибо!
Администраторы переводов {{SITENAME}}

----

Вы получили это сообщение, поскольку подписались на получение сообщений, связанных с переводами для {{SITENAME}}. Чтобы отписаться или изменить свои настройки уведомлений о переводах, перейдите по ссылке $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Здравствуйте, $2!

Вы получили это письмо, так как зарегистрировались на сайте {{SITENAME}} в качестве переводчика на следующий язык: $3.
Новая доступная для перевода страница — [[$4]]. Пожалуйста, переведите её:
$5

$6
$7

$8

Спасибо!

Администраторы переводов {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'перевести на $1',
	'translationnotifications-digestemail-subject' => 'Дайджест запросов на перевод от {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Здравствуйте, $1!

Вы получили это письмо, так как зарегистрированы на сайте {{SITENAME}} в качестве переводчика на следующий язык: $2.

Имеется $3 {{PLURAL:$3|страница|страницы|страниц}} для перевода. Подробности — ниже.

$4

Спасибо!
Сотрудники {{SITENAME}}

----

Вы получили это сообщение, поскольку подписались на получение сообщений, связанных с переводами для {{SITENAME}}. Чтобы отписаться или изменить свои настройки уведомлений о переводах, перейдите по ссылке <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => '$1 участник $2 пометил страницу «$3» доступную для перевода. Вы можете перевести её, перейдя по ссылке $4',
	'translationnotifications-edit-summary' => 'Уведомление о переводе: $1',
	'translationnotifications-email-priority' => 'Приоритет этой страницы — $1.',
	'translationnotifications-email-deadline' => 'Крайний срок для перевода этой страницы — $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|отправил|отправила}} уведомление о переводе страницы $3; языки: $4; крайний срок: $5; приоритет: $6; послано {{PLURAL:$7|одному адресату|$7 адресатам|$7 адресатам}}, неудачно для {{PLURAL:$8|одного адресата|$8 адресатов}}, пропущено для {{PLURAL:$9|одного адресата|$9 адресатов}}', # Fuzzy
	'log-name-notifytranslators' => 'Уведомления о переводе',
	'log-description-notifytranslators' => 'Журнал отправленных переводчикам уведомлений, касающихся переводимых страниц',
	'translationnotifications-sent-title' => 'Уведомление о переводе отправлено',
	'translationnotifications-sent-body' => 'Отправка уведомления о переводе выполнена',
	'translationnotifications-log-alllanguages' => 'все языки',
	'translationnotifications-nodeadline' => 'нет',
	'translationnotifications-signup-legal' => 'Предоставляя эту информацию, вы соглашаетесь с тем, что мы можем связаться с вами относительно связанных с {{SITENAME}} тем, которые, на наш взгляд, могут быть вам интересны. Вы также соглашаетесь с тем, что ваши персональные данные будут обрабатываться согласно нашей [[{{MediaWiki:Privacypage}}|политике конфиденциальности.]]',
);

/** Rusyn (русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'translationnotifications-languages' => 'Языкы',
	'translationnotifications-lang' => 'Язык № $1',
	'translationnotifications-nolang' => 'Звольте язык',
	'translationnotifications-contact' => 'Преферованы способы контакту',
	'translationnotifications-cmethod-email' => 'Імейл',
	'translationnotifications-cmethod-talkpage' => 'Діскузна сторінка',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Діскузна сторінка на іншых вікі',
	'translationnotifications-cmethod-feed' => 'Каналы',
	'translationnotifications-frequency' => 'Як часто ся контактовати',
	'translationnotifications-freq-week' => 'Найчастїше раз за рік',
	'translationnotifications-freq-month' => 'Не частїше як раз за місяць',
	'translationnotifications-submit' => 'Обновити наштелёваня',
	'translationnotifications-priority-high' => 'высока',
	'translationnotifications-priority-medium' => 'середня',
	'translationnotifications-priority-low' => 'низка',
	'translationnotifications-priority-unset' => '(не встановлено)',
	'translationnotifications-log-alllanguages' => 'вшыткы языкы',
	'translationnotifications-nodeadline' => 'жаден',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'translatorsignup' => 'පරිවර්තක ලියාපදිංචිය',
	'translationnotifications-desc' => 'පරිවර්තන නිවේදන වෙත ලියාපදිචි වීම සඳහා පරිවර්තකයන් හට ඉඩ දෙන්න',
	'translationnotifications-info' => 'පරිශීලකගේ තොරතුරු',
	'translationnotifications-username' => 'පරිශීලක නාමය:',
	'translationnotifications-emailstatus' => 'විද්‍යුත්-තැපැල් තත්වය:',
	'translationnotifications-email-confirmed' => 'ඔබේ විද්‍යුත්-තැපැල් ලිපිනය තහවුරු කරන ලදී',
	'translationnotifications-email-unconfirmed' => 'ඔබේ විද්‍යුත්-තැපැල් ලිපිනය තහවුරු කරන නොලදී. $1',
	'translationnotifications-languages' => 'භාෂාවන්',
	'translationnotifications-lang' => 'භාෂාව #$1',
	'translationnotifications-nolang' => 'භාෂාවක් තෝරාගන්න',
	'translationnotifications-contact' => 'වරණිත සම්බන්ධක ක්‍රම',
	'translationnotifications-cmethod-email' => 'විද්‍යුත් තැපෑල',
	'translationnotifications-cmethod-talkpage' => 'සාකච්ඡා පිටුව',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'වෙනත් විකියක කතාබහ පිටුව',
	'translationnotifications-cmethod-feed' => 'පෝෂකය',
	'translationnotifications-frequency' => 'සම්බන්ධ කිරීමේ වාර ගණන',
	'translationnotifications-freq-always' => 'එහි පරිවර්තනය කිරීමට අලුතින් යමක් ඇති විට',
	'translationnotifications-freq-week' => 'ගොඩක්ම සතියකට වරක්',
	'translationnotifications-freq-month' => 'ගොඩක්ම මාසකයකට වරක්',
	'translationnotifications-freq-weekly' => 'සතිපතා සංහිතාව',
	'translationnotifications-freq-monthly' => 'මාසික සංහිතාව',
	'translationnotifications-submit' => 'යාවත්කාලීන සැකසුම්',
	'translationnotifications-signup-success' => 'ඔබේ පරිවර්තන නිවේදන අභිරුචින් සුරක්ෂිත කරන ලදී.',
	'notifytranslators' => 'පරිවර්තකයන් දැනුවත් කරන්න',
	'translationnotifications-send-notification-button' => 'පරිවර්තකයන් වෙත නිවේදනයක් යවන්න',
	'translationnotifications-deadline-label' => 'මෙම නිවේදනයෙහි පෙන්වා දිය යුතු කාල සීමාව:',
	'translationnotifications-languages-to-notify-label' => 'නිවේදනය කල යුතු භාෂාවන්:',
	'translationnotifications-priority' => 'ප්‍රමුඛත්වය:',
	'translationnotifications-priority-high' => 'ඉහළ',
	'translationnotifications-priority-medium' => 'මධ්‍යම',
	'translationnotifications-priority-low' => 'අවම',
	'translationnotifications-priority-unset' => '(සකසා නැත)',
	'translationnotifications-translatablepage-title' => 'පරිවර්තනමය පිටු නාමය:',
	'translationnotifications-error-no-translatable-pages' => 'මෙම විකියේ පරිවර්තනමය පිටු කිසිවක් නොමැත.',
	'translationnotifications-email-subject' => 'කරුණාකර $1 පිටුව පරිවර්තනය කරන්න',
	'translationnotifications-notification-url-listitem' => '$1 වෙත පරිවර්තනය කරන්න',
	'translationnotifications-digestemail-notification-line' => '$1 දී, $2 විසින් "$3" පරිවර්තනය සඳහා සලකුණු කර ඇත. ඔබට එය $4 හිදී පරිවර්තනය කර හැක',
	'translationnotifications-edit-summary' => 'පරිවර්තන දැනුම් දීම: $1',
	'translationnotifications-email-priority' => 'මෙම පිටුවෙහි ප්‍රමුඛතාවය $1 යි.',
	'translationnotifications-email-deadline' => 'මෙම පිටුව පරිවර්තනය කිරීමේ නියමිත කාලය $1 වේ.',
	'log-name-notifytranslators' => 'පරිවර්තන නිවේදනයන්',
	'translationnotifications-sent-title' => 'පරිවර්තන නිවේදනය යවන ලදී',
	'translationnotifications-sent-body' => 'පරිවර්තන නිවේදනය යවන ලදී.',
	'translationnotifications-log-alllanguages' => 'සියලුම භාෂාවන්',
	'translationnotifications-nodeadline' => 'කිසිවක් නොමැත',
);

/** Slovak (slovenčina)
 * @author Kusavica
 */
$messages['sk'] = array(
	'translationnotifications-info' => 'Informácie o používateľovi',
	'translationnotifications-username' => 'Používateľské meno:',
	'translationnotifications-email-confirmed' => 'Vaša e-mailová adresa je potvrdená',
	'translationnotifications-email-unconfirmed' => 'Vaša e-mailová adresa nie je potvrdená. $1',
	'translationnotifications-email-notset' => 'Nezadali ste e-mailovú adresu. Môžete to urobiť vo vašich [[Special:Preferences|nastaveniach]].',
	'translationnotifications-languages' => 'Jazyky',
	'translationnotifications-lang' => 'Jazyk #$1',
	'translationnotifications-nolang' => 'Zvoľte si jazyk',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Diskusná stránka',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskusná stránka na inej wiki',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'vysoká',
	'translationnotifications-priority-medium' => 'stredná',
	'translationnotifications-priority-low' => 'nízka',
	'translationnotifications-priority-unset' => '(nedefinované)',
	'translationnotifications-email-subject' => 'Prosím, preložte stránku $1',
	'translationnotifications-log-alllanguages' => 'všetky jazyky',
	'translationnotifications-nodeadline' => 'nič',
);

/** Swedish (svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'translatorsignup' => 'Översättarregistrering',
	'translationnotifications-desc' => 'Låter översättare registrera sig för översättningsmeddelanden',
	'translationnotifications-info' => 'Användarinformation',
	'translationnotifications-username' => 'Användarnamn:',
	'translationnotifications-emailstatus' => 'E-poststatus:',
	'translationnotifications-email-confirmed' => 'Din e-postadress är bekräftad',
	'translationnotifications-email-unconfirmed' => 'Din e-postadress är inte bekräftad. $1',
	'translationnotifications-email-notset' => 'Du har inte angivit en e-postadress. Du kan göra det i dina [[Special:Preferences|inställningar]].',
	'translationnotifications-languages' => 'Språk',
	'translationnotifications-lang' => 'Språk #$1',
	'translationnotifications-nolang' => 'Välj ett språk',
	'translationnotifications-contact' => 'Föredragna kontaktmetoder',
	'translationnotifications-cmethod-email' => 'E-post',
	'translationnotifications-cmethod-talkpage' => 'Diskussionssida',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskussionssida på annan wiki',
	'translationnotifications-cmethod-feed' => 'Flöde',
	'translationnotifications-frequency' => 'Kontaktfrekvens',
	'translationnotifications-freq-always' => 'När det finns någonting nytt att översätta',
	'translationnotifications-freq-week' => 'Högst en gång i veckan',
	'translationnotifications-freq-month' => 'Högst en gång i månaden',
	'translationnotifications-freq-weekly' => 'Sammandrag varje vecka',
	'translationnotifications-freq-monthly' => 'Sammandrag varje månad',
	'translationnotifications-submit' => 'Uppdatera inställningar',
	'notifytranslators' => 'Meddela översättare',
	'translationnotifications-send-notification-button' => 'Skicka ett meddelande till översättare',
	'translationnotifications-deadline-label' => 'Tidsgränsen att ange i denna anmälan:',
	'translationnotifications-languages-to-notify-label' => 'Vilka språk som ska meddelas:',
	'translationnotifications-priority' => 'Prioritet:',
	'translationnotifications-priority-high' => 'hög',
	'translationnotifications-priority-medium' => 'mellan',
	'translationnotifications-priority-low' => 'låg',
	'translationnotifications-priority-unset' => '(inte inställd)',
	'translationnotifications-translatablepage-title' => 'Namn på översättningsbar sida:',
	'translationnotifications-error-no-translatable-pages' => 'Det finns inga översättningsbara sidor på denna wiki.',
	'translationnotifications-email-subject' => 'Var god översätt sidan $1',
	'translationnotifications-notification-url-listitem' => 'översätt till $1',
	'translationnotifications-digestemail-subject' => 'E-postsammandrag för översättningsbegäran från {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Översättningsmeddelande: $1',
	'translationnotifications-email-priority' => 'Prioriteten för denna sida är $1.',
	'translationnotifications-log-alllanguages' => 'alla språk',
	'translationnotifications-nodeadline' => 'ingen',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 * @author Logicwiki
 * @author Shanmugamp7
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'translatorsignup' => 'மொழிபெயர்ப்பாளர் பதிவு செய்தல்',
	'translationnotifications-info' => 'பயனர் தகவல்',
	'translationnotifications-username' => 'பயனர் பெயர்:',
	'translationnotifications-emailstatus' => 'மின்னஞ்சல் நிகழ்நிலை:',
	'translationnotifications-email-confirmed' => 'மின்னஞ்சல் முகவரி உறுதிசெய்யப்பட்டது',
	'translationnotifications-email-unconfirmed' => 'உங்கள் மின்னஞ்சல் முகவரி உறுதி செய்யப்படவில்லை. $1',
	'translationnotifications-email-notset' => 'நீங்கள் மின்னஞ்சல் முகவரி ஏதும் வழங்கவில்லை. உங்கள் [[Special:Preferences|விருப்பத்தேர்வுகளில்]] நீங்கள் இதைச் செய்யலாம்.',
	'translationnotifications-languages' => 'மொழிகள்',
	'translationnotifications-lang' => 'மொழி  #$1',
	'translationnotifications-nolang' => 'மொழியைத் தேர்ந்தெடுக்கவும்',
	'translationnotifications-contact' => 'விருப்பமான தொடர்பு முறைகள்',
	'translationnotifications-cmethod-email' => 'மின்னஞ்சல்',
	'translationnotifications-cmethod-talkpage' => 'உரையாடல் பக்கம்',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'மற்றொரு விக்கியின் பேச்சுப் பக்கம்',
	'translationnotifications-cmethod-feed' => 'ஊட்டம்',
	'translationnotifications-freq-week' => 'பெரும்பாலும் கிழமையொன்றுக்கு ஒரு முறை',
	'translationnotifications-freq-month' => 'பெரும்பாலும் திங்களொன்றுக்கு ஒரு முறை',
	'translationnotifications-freq-weekly' => 'வாராந்திரத் தொகுப்பு',
	'translationnotifications-freq-monthly' => 'மாதாந்திரத் தொகுப்பு',
	'translationnotifications-submit' => 'அமைப்புகளை புதுப்பி',
	'translationnotifications-signup-success' => 'உங்கள் மொழிபெயர்ப்பு அறிவிப்பு விருப்பங்கள் சேமிக்கப்பட்டுள்ளது.',
	'notifytranslators' => 'மொழிபெயர்ப்பாளர்களுக்கு அறிவிக்கவும்',
	'translationnotifications-send-notification-button' => 'மொழிபெயர்ப்பாளர்களுக்கு ஒரு அறிவிப்பை அனுப்பு',
	'translationnotifications-deadline-label' => 'இந்த அறிவிப்பில் கட்டவேண்டிய கடைசிநாள்:',
	'translationnotifications-languages-to-notify-label' => 'எந்த மொழியில் அறிவிக்க வேண்டும்:',
	'translationnotifications-priority' => 'முக்கியத்துவம்:',
	'translationnotifications-priority-high' => 'அதிகம்',
	'translationnotifications-priority-medium' => 'நடுத்தரம்',
	'translationnotifications-priority-low' => 'குறைவு',
	'translationnotifications-priority-unset' => '(அமைக்கப்படவில்லை)',
	'translationnotifications-translatablepage-title' => 'மொழிபெயர்க்கக் கூடிய பக்கப் பெயர்:',
	'translationnotifications-error-no-translatable-pages' => 'இந்த விக்கியில் மொழிபெயர்க்கத் தகுந்த பக்கங்கள் எதுவுமில்லை.',
	'translationnotifications-email-subject' => '$1 பக்கத்தை அருள்கூர்ந்து மொழிபெயர்க்கவும்.',
	'translationnotifications-email-body' => 'வணக்கம் $1,

{{SITENAME}} இல் $2 மொழிக்கான மொழிபெயர்ப்பாளராக பதிவு செய்துள்ளதால், நீங்கள் இந்த மின்னஞ்சலை பெறுகிறீர்கள்.

அங்கு மொழிபெயர்க்க இங்கு ஒரு பக்கம் உள்ளது: $3.
கீழ்க்காணும் இணைப்பை சொடுக்குவதன் மூலம் நீங்கள் அதை மொழிபெயர்க்கலாம்:
$4

$5
$6

$7

உங்கள் உதவி பெரிதும் பாராட்டப்படுகிறது. உங்களைப் போன்ற மொழிபெயர்ப்பாளர்களே {{SITENAME}} தளம் ஒரு உண்மையான பன்மொழி சமுதாயமாக செயல்பட உதவுகின்றனர்.

நன்றி!
{{SITENAME}} மொழிபெயர்ப்பு ஒருங்கிணைப்பாளர்கள்

----

{{SITENAME}} தளத்தில் மொழிபெயர்ப்பு தொடர்பான மின்னஞ்சல்களை பெற நீங்கள் பதிவு செய்துள்ளதால், இந்த மின்னஞ்சலை நீங்கள் பெறுகிறீர்கள். பதிவு நீக்க அல்லது மொழிபெயர்ப்புக்கான அறிவிக்கை விருப்பத்தேர்வுகளை மாற்ற, தயவுசெய்து பார்க்க $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'வணக்கம் $2,

{{SITENAME}} இல் $3 மொழிக்கான மொழிபெயர்ப்பாளராக பதிவு செய்துள்ளதால், நீங்கள் இந்த அறிவிக்கையைப் பெறுகிறீர்கள்.

பக்கம் [[$4]] மொழிபெயர்க்க உள்ளது. நீங்கள் அதனை இங்கு மொழிபெயர்க்கலாம்: $3.

$5

$6
$7

$8

உங்கள் உதவி பெரிதும் பாராட்டப்படுகிறது. உங்களைப் போன்ற மொழிபெயர்ப்பாளர்களே {{SITENAME}} தளம் ஒரு உண்மையான பன்மொழி சமுதாயமாக செயல்பட உதவுகின்றனர்.

நன்றி!
{{SITENAME}} மொழிபெயர்ப்பு ஒருங்கிணைப்பாளர்கள்', # Fuzzy
	'translationnotifications-notification-url-listitem' => '$1க்கு மொழிபெயர்க்கவும்',
	'translationnotifications-digestemail-body' => 'வணக்கம் $1,

{{SITENAME}} இல் $2 மொழிக்கான மொழிபெயர்ப்பாளராக பதிவு செய்துள்ளதால், நீங்கள் இந்த மின்னஞ்சலை பெறுகிறீர்கள்.

அங்கு மொழிபெயர்க்க {{PLURAL:$3|1 பக்கம்|$3 பக்கங்கள்}} உள்ளன. அதன் விவரங்கள் கீழே கொடுக்கப்பட்டுள்ளன
$4

உங்கள் உதவி பெரிதும் பாராட்டப்படுகிறது. உங்களைப் போன்ற மொழிபெயர்ப்பாளர்களே {{SITENAME}} தளம் ஒரு உண்மையான பன்மொழிச் சமுதாயமாக செயல்பட உதவுகின்றனர்.

நன்றி!
{{SITENAME}} மொழிபெயர்ப்பு ஒருங்கிணைப்பாளர்கள்

----

{{SITENAME}} தளத்தில் மொழிபெயர்ப்பு தொடர்பான மின்னஞ்சல்களை பெற நீங்கள் பதிவு செய்துள்ளதால், இந்த மின்னஞ்சலை நீங்கள் பெறுகிறீர்கள். பதிவு நீக்க அல்லது மொழிபெயர்ப்புக்கான அறிவிக்கை விருப்பத்தேர்வுகளை மாற்ற, தயவுசெய்து செல்லவும் <$5>.', # Fuzzy
	'translationnotifications-edit-summary' => 'மொழிபெயர்ப்பு அறிவிப்பு: $1',
	'translationnotifications-email-priority' => 'இந்த பக்கத்தின் முக்கியத்துவம்: $1',
	'translationnotifications-email-deadline' => 'இப்பக்கத்தை மொழிபெயர்க்க கடைசி நாள் $1',
	'log-name-notifytranslators' => 'மொழிபெயர்ப்பு அறிவிப்புகள்',
	'translationnotifications-sent-title' => 'மொழிபெயர்ப்பு அறிவிப்பு அனுப்பப்பட்டது',
	'translationnotifications-sent-body' => 'மொழிபெயர்ப்பு அறிவிப்பு அனுப்பப்பட்டது.',
	'translationnotifications-log-alllanguages' => 'மொழிகள் அனைத்தும்',
	'translationnotifications-nodeadline' => 'ஏதுமில்லை',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'translationnotifications-info' => 'వాడుకరి సమాచారం',
	'translationnotifications-username' => 'వాడుకరి పేరు:',
	'translationnotifications-emailstatus' => 'ఈమెయిలు స్థితి:',
	'translationnotifications-languages' => 'భాషలు',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'translatorsignup' => 'Pagpaparehistro ng tagapagsalinwika',
	'translatorsignup-summary' => 'Gamitin ang pahinang ito upang ipahiwatig kung anong mga wika ang mapasasalinan mo, at kung paano mo gustong kaugnayin hinggil sa bagong mga kahilingan ng pagsasalinwika.',
	'translationnotifications-desc' => 'Nagpapahintulot sa mga tagapagsalinwika upang makapagparehistro para sa mga pagpapabatid na pangsalinwika',
	'translationnotifications-info' => 'Impormasyon ng tagagamit',
	'translationnotifications-username' => 'Pangalan ng tagagamit:',
	'translationnotifications-emailstatus' => 'Katayuan ng e-liham:',
	'translationnotifications-email-confirmed' => 'Natiyak na ang iyong tirahan ng e-liham',
	'translationnotifications-email-disablemail' => 'Natiyak na ang iyong tirahan ng e-liham, subalit sa loob ng iyong [[Special:Preferences|mga kanaisan]] ay hiniling mong huwag makatanggap ng e-liham.',
	'translationnotifications-email-unconfirmed' => 'Hindi pa natitiyak na ang iyong tirahan ng e-liham. $1',
	'translationnotifications-email-notset' => 'Hindi ka nagbigay ng isang tirahan ng e-liham. Magagawa mo iyan sa loob ng iyong [[Special:Preferences|mga nais]].',
	'translationnotifications-languages' => 'Mga wika',
	'translationnotifications-lang' => 'Wika #$1',
	'translationnotifications-nolang' => 'Pumili ng isang wika',
	'translationnotifications-contact' => 'Mga pamamaraan sa mas nais na pakikipag-ugnayan',
	'translationnotifications-cmethod-email' => 'E-liham',
	'translationnotifications-cmethod-talkpage' => 'Pahina ng usapan',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pahina ng usapan sa ibang wiki',
	'translationnotifications-cmethod-feed' => 'Pakain',
	'translationnotifications-frequency' => 'Dalas ng pakikipag-ugnayan',
	'translationnotifications-freq-always' => 'Kapag mayroong isang bagong bagay na isasalinwika',
	'translationnotifications-freq-week' => 'Pinaka marami na ang isang ulit sa loob ng isang linggo',
	'translationnotifications-freq-month' => 'Pinaka marami na ang isang ulit sa loob ng isang buwan',
	'translationnotifications-freq-weekly' => 'Lingguhang katipunan',
	'translationnotifications-freq-monthly' => 'Buwanang katipunan',
	'translationnotifications-submit' => 'Isapanahon ang mga katakdaan',
	'translationnotifications-signup-success' => 'Nasagip na ang iyong mga kanaisan sa pagpapabatid na pangsalinwika.',
	'notifytranslators' => 'Pabatiran ang mga tagapagsalinwika',
	'translationnotifications-submit-ok' => 'Naidagdag na ang mga pagpapabatid sa isang pila at naihatid sa pamamagitan ng isang panlikurang trabaho.',
	'translationnotifications-send-notification-button' => 'Magpadala ng isang pagpapabatid sa mga tagapagsalinwika',
	'translationnotifications-deadline-label' => 'Huling araw na ipapahiwatig sa loob ng pagpapabatid na ito:',
	'translationnotifications-languages-to-notify-label' => 'Kung aling mga wika ang pababatiran:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Mga kodigo ng wika na pinaghihiwalay ng mga kuwit; iwanang walang laman upang ipabatid sa lahat ng mga wika.',
	'translationnotifications-priority' => 'Dapat unahin:',
	'translationnotifications-priority-high' => 'mataas',
	'translationnotifications-priority-medium' => 'gitnang sukat',
	'translationnotifications-priority-low' => 'mababa',
	'translationnotifications-priority-unset' => '(huwag itakda)',
	'translationnotifications-translatablepage-title' => 'Maisasalinwikang pangalan ng pahina:',
	'translationnotifications-error-no-translatable-pages' => 'Walang mga pahinang maisasalinwika sa loob ng wiking ito.',
	'translationnotifications-email-subject' => 'Paki isalinwika ang pahinang $1',
	'translationnotifications-email-body' => 'Kumusta $1,

Natanggap mo ang elektronikong liham na ito dahil nagparehistro ka bilang isang tagapagsalinwika sa $2 doon sa {{SITENAME}}.

Mayroong isang pahinang isasalinwika roon: $3.
Maisasalinwika iyon sa pamamagitan ng paglagitik sa sumusunod na kawing:
<$4>

$5
$6

$7

Talagang ikinalulugod ang iyong pagtulong. Ang mga tagapagsalinwikang katulad mo ay nakakatulong sa {{SITENAME}} upang tumakbo 
bilang isang tunay na pamayanan ng maramihang mga wika.

Salamat sa iyo!
Mga tagapangasiwa ng salinwika ng {{SITENAME}} 

----

Nakakatanggap ka ng ganitong elektronikong liham dahil nagpatala ka upang makatanggap ng mga e-liham na may kaugnayan sa mga salinwika na nasa {{SITENAME}}. Upang huwag nang magpasipi o upang baguhin ang mga kanaisan mo ng pagpapabatid para sa mga salinwika, paki dumalaw sa $8.', # Fuzzy
	'translationnotifications-talkpage-body' => 'Kumusta $2,

Natanggap mo ang pagpapabatid na ito dahil nagpatala ka bilang isang tagapagsalinwika sa $3 doon sa {{SITENAME}}.
Makukuha ang pahinang [[$4]] para sa pagsasalinwika. Maisasalinwika mo ito rito:
$5

$6
$7

$8

Talagang ikinalulugod ang iyong pagtulong. Ang mga tagapagsalinwikang katulad mo ay nakakatulong sa {{SITENAME}}  upang tumakbo 
bilang isang tunay na pamayanan ng maramihang mga wika.

Salamat sa iyo!

Mga koordinador sa pagsasalinwika ng {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'isalinwika upang maging $1',
	'translationnotifications-digestemail-subject' => 'Elektronikong liham ng kabuuran para sa mga kahilingan ng pagsasalinwika magmula sa {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Kumusta $1,

Natanggap mo ang elektronikong liham na ito dahil nagparehistro ka bilang isang tagapagsalinwika sa $2 doon sa {{SITENAME}}.

Mayroong makukuhang {{PLURAL:$3|1 pahina|$3 mga pahina}} para sa pagsasalinwika. Ibinigay sa ibaba ang mga detalye

$4

Talagang ikinalulugod ang iyong pagtulong. Ang mga tagapagsalinwikang katulad mo ay nakakatulong sa {{SITENAME}} upang mapatakbo 
bilang isang tunay na pamayanan ng maramihang mga wika.

Salamat sa iyo!
Mga tagapangasiwa ng salinwika ng {{SITENAME}} 

----

Nakakatanggap ka ng ganitong elektronikong liham dahil nagpatala ka upang makatanggap ng mga e-liham na may kaugnayan sa mga salinwika na nasa {{SITENAME}}. Upang huwag nang magpasipi o upang baguhin ang mga kanaisan mo ng pagpapabatid para sa mga salinwika, paki dalawin ang <<$5>>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Noong $1, minarkahan ni $2 ang "$3" para maisalinwika. Maisasalinwika mo ito roon sa $4',
	'translationnotifications-edit-summary' => 'Pagpapabatid ng salinwika: $1',
	'translationnotifications-email-priority' => 'Ang dapat na unahin sa pahinang ito ay ang $1.',
	'translationnotifications-email-deadline' => 'Ang huling araw para sa pagsasalinwika ng pahinang ito ay $1.',
	'logentry-translationnotifications-sent' => '{{GENDER:$2|Nagpadala}} si $1 ng isang pagpapabatid hinggil sa pagsasalinwika ng pahinang $3; mga wika: $4; huling araw: $5; pagkakauna: $6; ipinadala sa {{PLURAL:$7|isang tagatanggap|$7 mga tagatanggap}}, nabigo para sa {{PLURAL:$8|isang tagatanggap|$8 mga tagatanggap}}, nilaktawan para sa {{PLURAL:$9|isang tagatanggap|$9 mga tagatanggap}}', # Fuzzy
	'log-name-notifytranslators' => 'Mga pagpapabatid ng pagsasalinwika',
	'log-description-notifytranslators' => 'Isang talaan ng mga pagpapabatid ang ipinadala sa mga tagapagsalinwika hinggil sa mga pahinang maisasalinwika',
	'translationnotifications-sent-title' => 'Naipadala na ang pagpapabatid ng salinwika',
	'translationnotifications-sent-body' => 'Naipadala na ang pagpapabatid ng salinwika.',
	'translationnotifications-log-alllanguages' => 'lahat ng mga wika',
	'translationnotifications-nodeadline' => 'wala',
	'translationnotifications-signup-legal' => 'Sumasang-ayon ka na sa pamamagitan ng pagbibigay ng kabatirang ito na maaaring makipag-ugnayan kami sa iyo hinggil sa mga paksang may kaugnayan sa {{SITENAME}} na iniisip naming makakatawag ng pagpansin mo. Sumasang-ayon ka na ang dato mo ay nakapailalim sa aming [[{{MediaWiki:Privacypage}}|patakaran ng paglilihim.]]',
);

/** Turoyo (Ṫuroyo)
 * @author Ariyo
 */
$messages['tru'] = array(
	'translationnotifications-languages' => 'Leşone',
	'translationnotifications-lang' => 'Leşono $1',
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'translationnotifications-info' => 'ئىشلەتكۈچى ئۇچۇرى',
	'translationnotifications-username' => 'ئىشلەتكۈچى ئاتى:',
	'translationnotifications-languages' => 'تىللار',
	'translationnotifications-nolang' => 'بىر تىل تاللاڭ',
	'translationnotifications-cmethod-email' => 'ئېلخەت',
	'translationnotifications-cmethod-talkpage' => 'مۇنازىرە بېتى',
	'translationnotifications-cmethod-feed' => 'قانال',
	'translationnotifications-priority' => 'ئالدىنلىق:',
	'translationnotifications-priority-high' => 'يۇقىرى',
	'translationnotifications-priority-medium' => 'ئوتتۇرا',
	'translationnotifications-priority-low' => 'تۆۋەن',
	'translationnotifications-priority-unset' => '(تەڭشەلمىگەن)',
	'translationnotifications-nodeadline' => 'يوق',
);

/** Ukrainian (українська)
 * @author Olvin
 * @author Ата
 */
$messages['uk'] = array(
	'translatorsignup' => 'Записатися перекладачем',
	'translatorsignup-summary' => 'Ця сторінка слугує для того щоб обрати, якими мовами Ви можете перекладати, та як повідомляти Вас про нові запити на переклад.',
	'translationnotifications-desc' => 'Дозволяє перекладачам підписатися на отримання повідомлень про переклад.',
	'translationnotifications-info' => 'Відомості про дописувача',
	'translationnotifications-username' => "Ім'я користувача:",
	'translationnotifications-emailstatus' => 'Стан електронної пошти:',
	'translationnotifications-email-confirmed' => 'Адресу вашої електронної пошти підтверджено',
	'translationnotifications-email-disablemail' => 'Адресу вашої електронної пошти підтверджено, але у [[Special:Preferences|ваших налаштуваннях]] не дозволено отримання електронної пошти.',
	'translationnotifications-email-unconfirmed' => 'Адресу вашої електронної пошти не підтверджено. $1',
	'translationnotifications-email-notset' => 'Ви не надали адресу електронної пошти. Ви можете зробити це у [[Special:Preferences|ваших налаштуваннях]].',
	'translationnotifications-languages' => 'Мови',
	'translationnotifications-lang' => 'Мова № $1',
	'translationnotifications-nolang' => 'Оберіть мову',
	'translationnotifications-contact' => "Методи зв'язку, яким Ви надаєте перевагу",
	'translationnotifications-cmethod-email' => 'Електронна пошта',
	'translationnotifications-cmethod-talkpage' => 'Сторінка обговорення',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Сторінка обговорення в іншій Вікі',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Як часто звертатися',
	'translationnotifications-freq-always' => 'Коли є щось нове для перекладу',
	'translationnotifications-freq-week' => 'Не частіше одного разу на тиждень',
	'translationnotifications-freq-month' => 'Не частіше, ніж раз на місяць',
	'translationnotifications-freq-weekly' => 'Щотижневий стислий звіт',
	'translationnotifications-freq-monthly' => 'Щомісячний стислий виклад',
	'translationnotifications-submit' => 'Оновити налаштування',
	'translationnotifications-signup-success' => 'Ваші налаштування для сповіщень перекладу було збережено.',
	'notifytranslators' => 'Сповістити перекладачів',
	'translationnotifications-submit-ok' => 'Сповіщення було поставлено у чергу і вони розсилаються у фоновому режимі.',
	'translationnotifications-send-notification-button' => 'Надіслати сповіщення перекладачам',
	'translationnotifications-deadline-label' => 'Кінцевий термін, зазначений у цьому повідомленні:',
	'translationnotifications-languages-to-notify-label' => 'Мови для сповіщення:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Відокремлені комою коди мов; Залиште порожнім для сповіщення всіх мов.',
	'translationnotifications-priority' => 'Пріоритет:',
	'translationnotifications-priority-high' => 'високий',
	'translationnotifications-priority-medium' => 'середній',
	'translationnotifications-priority-low' => 'низький',
	'translationnotifications-priority-unset' => '(не встановлено)',
	'translationnotifications-translatablepage-title' => 'Назва сторінки для перекладу:',
	'translationnotifications-error-no-translatable-pages' => 'У цій Вікі немає сторінок для перекладу.',
	'translationnotifications-email-subject' => 'Будь ласка, перекладіть сторінку $1',
	'translationnotifications-email-body' => 'Привіт,  $1. 

Ви отримали цього листа, тому що на {{SITENAME}} ви {{GENDER:$10|зареєструвалися}} на {{SITENAME}} як перекладач {{PLURAL:$9|такими мовами}}: $2.

Сторінка $3 доступна для перекладу, її можна перекласти тут:
$4

$5
$6

$7

Ваша допомога вітається. Перекладачі, як ви, допомагають сайту {{SITENAME}} функціонувати як справді багатомовна спільнота.

Дякуємо!
Координатори перекладів {{SITENAME}}

----

Ви отримуєте ці повідомлення електронною поштою, тому що ви підписалися на отримання повідомлень щодо перекладу на {{SITENAME}}. Щоб відписатися або змінити параметри сповіщення про переклади, будь ласка, відвідайте $8',
	'translationnotifications-talkpage-body' => 'Привіт,  $2!

Ви отримали це повідомлення тому, що ви {{GENDER:$1|зареєстровані}} на {{SITENAME}} як перекладач {{PLURAL:$9|такими мовами}}: $3.
Сторінка [[$4]] доступна для перекладу, її можна перекласти тут:
$5

$6
$7

$8

Ваша допомога вітається. Перекладачі, як ви, допомагають сайту {{SITENAME}} функціонувати як справді багатомовна спільнота.

Дякуємо!

Координатори перекладів {{SITENAME}}',
	'translationnotifications-notification-url-listitem' => 'Перекласти мовою $1',
	'translationnotifications-digestemail-subject' => 'Дайджест повідомлення електронною поштою із запитами перекладу  від {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Привіт,  $1. 

Ви отримали цього листа, тому що ви {{GENDER:$1|зареєструвалися}} на {{SITENAME}} як перекладач на такі мови: $2.

Є $3 {{PLURAL:$3|сторінка|сторінки|сторінок}} для перекладу: $3. Подробиці наведено нижче.

$4

Ваша допомога вітається. Перекладачі, як ви, допомагають сайту {{SITENAME}} функціонувати як справді багатомовна спільнота.

Дякуємо!

Адміністрація перекладу {{SITENAME}}

----

Ви отримуєте ці повідомлення електронною поштою, бо ви підписалися на отримання повідомлень щодо перекладу на {{SITENAME}}. Щоб відписатися або змінити параметри сповіщення про переклади, будь ласка, відвідайте <$5>',
	'translationnotifications-digestemail-notification-line' => '$1  $2 сторінку $3 позначено для перекладу. Ви можете перекласти  її: $4.',
	'translationnotifications-edit-summary' => 'Сповіщення перекладу: $1',
	'translationnotifications-email-priority' => 'Пріоритет цієї сторінки — $1.',
	'translationnotifications-email-deadline' => 'Кінцевий термін для перекладу цієї сторінки – $1 .',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|надіслав|надіслала}} сповіщення про сторінки до перекладу ($3 {{PLURAL:$1|мовою|мовами}} $4) із кінцевим терміном $5 та пріоритетом $6. Вдало надіслано {{PLURAL:$7|$7 одержувачу|$7 одержувачам}}, невдало - {{PLURAL:$8|$8 одежувачу|$8 одержувачам}}, {{PLURAL:$9|$9 одержувача|$9 одержувачів}} було пропущено.',
	'log-name-notifytranslators' => 'Сповіщення перекладу',
	'log-description-notifytranslators' => 'Журнал сповіщень, надісланих перекладачам, про сторінки до перекладу.',
	'translationnotifications-sent-title' => 'Повідомлення про переклад надіслано.',
	'translationnotifications-sent-body' => 'Повідомлення про переклад було надіслано.',
	'translationnotifications-log-alllanguages' => 'усі мови',
	'translationnotifications-nodeadline' => 'немає',
	'translationnotifications-signup-legal' => 'Надаючи цю інформацію, Ви погоджуєтеся, що ми можемо контактувати з Вами за темами, що стосуються {{SITENAME}}, які, на нашу думку, можуть бути цікавими для Вас. Ви погоджуєтеся, що ваші дані є предметом [[{{MediaWiki:Privacypage}}|нашої політики конфіденційності]].',
);

/** Urdu (اردو)
 * @author Muhammad Shuaib
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'translatorsignup' => 'مترجم سائن اپ',
	'translationnotifications-info' => 'صارف کی معلومات',
	'translationnotifications-username' => 'صارف کا نام:',
	'translationnotifications-emailstatus' => 'ای میل کا درجہ:',
	'translationnotifications-email-confirmed' => 'آپ کا ای میل ایڈریس کی تصدیق ہوتی ہے',
	'translationnotifications-languages' => 'زبانوں میں',
	'translationnotifications-nolang' => 'ایک زبان کا انتخاب کریں',
	'translationnotifications-contact' => 'پسندیدہ رابطہ طریقوں',
	'translationnotifications-cmethod-email' => 'ای میل',
	'translationnotifications-cmethod-talkpage' => 'صفحہ کی بات',
	'translationnotifications-freq-month' => 'ایک ماہ میں سب سے زیادہ ایک بار پر',
	'translationnotifications-freq-weekly' => 'ہفتہ وار ڈائجسٹ',
	'translationnotifications-freq-monthly' => 'ماہانہ ڈائجسٹ',
	'translationnotifications-submit' => 'اپ ڈیٹ کی ترتیبات',
	'notifytranslators' => 'مترجمین مطلع کریں',
	'translationnotifications-send-notification-button' => 'مترجمین کے لئے ایک اطلاعاتی پیغام بھیجیں',
	'translationnotifications-languages-to-notify-label' => 'مطلع کریں جو زبانیں:',
	'translationnotifications-priority' => 'ترجیح:',
	'translationnotifications-priority-high' => 'اعلی',
	'translationnotifications-priority-medium' => 'درمیانے',
	'translationnotifications-priority-low' => 'کم',
	'translationnotifications-translatablepage-title' => 'ترجمہ صفحہ کا نام:',
	'translationnotifications-talkpage-body' => 'سلام $2،

آپ کو یہ اطلاع اس لیے موصول ہورہی ہے کہ آپ {{SITENAME}} پر بطور مترجم $3 درج ہیں۔
صفحہ [[$4]] ترجمہ کے لیے دستیاب ہے۔ آپ اس کا ترجمہ یہاں کرسکتے ہیں:
$5

$6
$7

$8

آپ کی معاونت نہایت قابل قدر ہے۔ آپ جیسے مترجمین {{SITENAME}} کی مدد کرسکتے ہیں تاکہ متعدد الالسنہ برادری کی حیثیت سے کام کیا جاسکے۔

شکریہ!

{{SITENAME}} ترجمہ سے مربوط افراد', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'ترجمہ در $1',
	'translationnotifications-edit-summary' => 'اطلاع برائے ترجمہ: $1',
	'log-name-notifytranslators' => 'ترجمہ کی اطلاعات',
	'translationnotifications-sent-title' => 'ترجمہ اطلاع بھیجا',
	'translationnotifications-sent-body' => 'ترجمہ اطلاعاتی پیغام بھیجا گیا تھا.',
	'translationnotifications-log-alllanguages' => 'تمام زبانوں',
	'translationnotifications-nodeadline' => 'کوئی بھی نہیں',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'translatorsignup' => 'Đăng ký biên dịch viên',
	'translatorsignup-summary' => 'Sử dụng trang này để cho biết các ngôn ngữ mà bạn có thể biên dịch ra và làm thế nào để liên lạc với bạn về các yêu cầu bản dịch.',
	'translationnotifications-desc' => 'Cho phép các biên dịch viên đăng ký để nhận các thông báo biên dịch',
	'translationnotifications-info' => 'Thông tin cá nhân',
	'translationnotifications-username' => 'Tên người dùng:',
	'translationnotifications-emailstatus' => 'Trạng thái thư điện tử:',
	'translationnotifications-email-confirmed' => 'Địa chỉ thư điện tử của bạn đã được xác nhận',
	'translationnotifications-email-disablemail' => 'Địa chỉ thư điện tử của bạn đã được xác nhận, nhưng bạn đã quyết định không nhận thông báo qua thư điện tử trong [[Special:Preferences|tùy chọn]].',
	'translationnotifications-email-unconfirmed' => 'Địa chỉ thư điện tử của bạn chưa được xác nhận. $1',
	'translationnotifications-email-notset' => 'Bạn chưa cung cấp địa chỉ thư điện tử trong [[Special:Preferences|tùy chọn]].',
	'translationnotifications-languages' => 'Ngôn ngữ',
	'translationnotifications-lang' => 'Ngôn ngữ #$1',
	'translationnotifications-nolang' => 'Chọn ngôn ngữ',
	'translationnotifications-contact' => 'Phương tiện liên lạc ưa thích',
	'translationnotifications-cmethod-email' => 'Thư điện tử',
	'translationnotifications-cmethod-talkpage' => 'Trang thảo luận',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Trang thảo luận tại wiki khác',
	'translationnotifications-cmethod-feed' => 'Nguồn tin (feed)',
	'translationnotifications-frequency' => 'Chu kỳ liên lạc',
	'translationnotifications-freq-always' => 'Khi nào có gì mới để biên dịch',
	'translationnotifications-freq-week' => 'Tối đa mỗi tuần một lần',
	'translationnotifications-freq-month' => 'Tối đa mỗi tháng một lần',
	'translationnotifications-freq-weekly' => 'Tóm tắt hàng tuần',
	'translationnotifications-freq-monthly' => 'Tóm tắt hàng tháng',
	'translationnotifications-submit' => 'Cập nhật tùy chọn',
	'translationnotifications-signup-success' => 'Đã lưu các tùy chọn thông báo biên dịch.',
	'notifytranslators' => 'Báo cho biên dịch viên',
	'translationnotifications-submit-ok' => 'Các thông báo đã được thêm vào hàng đợi gửi trong bối cảnh.',
	'translationnotifications-send-notification-button' => 'Gửi thông báo cho các biên dịch viên.',
	'translationnotifications-deadline-label' => 'Ngày hạn để nhắc đến trong thông báo này:',
	'translationnotifications-languages-to-notify-label' => 'Các ngôn ngữ để báo:',
	'translationnotifications-languages-to-notify-label-help-message' => 'Các mã ngôn ngữ (phân cách bằng dấu phẩy); để trống để báo tất cả các ngôn ngữ.',
	'translationnotifications-priority' => 'Ưu tiên:',
	'translationnotifications-priority-high' => 'cao',
	'translationnotifications-priority-medium' => 'thường',
	'translationnotifications-priority-low' => 'thấp',
	'translationnotifications-priority-unset' => '(không định)',
	'translationnotifications-translatablepage-title' => 'Tên trang dịch được:',
	'translationnotifications-error-no-translatable-pages' => 'Không có trang dịch được tại wiki này.',
	'translationnotifications-email-subject' => 'Xin vui lòng dịch trang $1',
	'translationnotifications-email-body' => '{{PLURAL:$9}}Xin chào $1,

Bạn nhận được thư điện tử này vì bạn đã đăng ký làm biên dịch viên $2 tại {{SITENAME}}.

Hiện có trang để dịch tại đấy: $3.
Bạn có thể dịch nó dùng liên kết sau:
$4

$5
$6

$7

Cám ơn!
Nhóm điều phối biên dịch {{SITENAME}}

----

Bạn nhận được thư điện tử này vì bạn đã quyết định nhận các thư điện tử có liên quan đến việc biên dịch {{SITENAME}}. Để bỏ đăng ký hoặc thay đổi các tùy chọn về thông báo biên dịch, hãy ghé vào $8.', # Fuzzy
	'translationnotifications-talkpage-body' => '{{PLURAL:$9}}Xin chào $2,

Bạn nhận được thư điện tử này vì bạn đã đăng ký làm biên dịch viên $3 tại {{SITENAME}}.
Trang [[$4]] mới có sẵn để dịch. Bạn có thể dịch nó dùng liên kết sau:
$5

$6
$7

$8

Cám ơn!

Nhóm điều phối biên dịch {{SITENAME}}', # Fuzzy
	'translationnotifications-notification-url-listitem' => 'dịch ra $1',
	'translationnotifications-digestemail-subject' => 'Thư điện tử tóm tắt các yêu cầu biên dịch từ {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Xin chào $1,

Bạn nhận được thư điện tử này vì bạn đã đăng ký làm biên dịch viên $2 tại {{SITENAME}}.

Hiện có {{PLURAL:$3|trang|$3 trang}} để dịch. Các chi tiết được đưa dưới đây:

$4

Rất cám ơn sự giúp đỡ của bạn. {{SITENAME}} hoạt động nhờ các biên dịch viên như bạn.

Ban quản lý biên dịch {{SITENAME}}

----

Bạn nhận được thư điện tử này vì bạn đã quyết định nhận các thư điện tử có liên quan đến việc biên dịch {{SITENAME}}. Để bỏ đăng ký hoặc thay đổi các tùy chọn về thông báo biên dịch, hãy ghé vào <$5>.', # Fuzzy
	'translationnotifications-digestemail-notification-line' => 'Ngày $1, $2 đã đánh dấu “$3” là cần được dịch. Bạn có thể biên dịch nó tại $4.',
	'translationnotifications-edit-summary' => 'Thông báo biên dịch: $1',
	'translationnotifications-email-priority' => 'Trang này có ưu tiên $1.',
	'translationnotifications-email-deadline' => 'Công việc dịch trang này sẽ hết hạn $1.',
	'logentry-translationnotifications-sent' => '{{GENDER:$2}}$1 đã gửi thông báo về việc thông dịch trang $3; ngôn ngữ: $4; ngày hạn: $5; ưu tiên: $6; được gửi cho $7 người, không gửi được cho $8 người, bỏ qua $9 người', # Fuzzy
	'log-name-notifytranslators' => 'Thông báo biên dịch',
	'log-description-notifytranslators' => 'Nhật trình các thông báo được gửi cho biên dịch viên về các trang dịch được',
	'translationnotifications-sent-title' => 'Thông báo biên dịch đã được gửi',
	'translationnotifications-sent-body' => 'Thông báo biên dịch đã được gửi.',
	'translationnotifications-log-alllanguages' => 'tất cả các ngôn ngữ',
	'translationnotifications-nodeadline' => 'không có',
	'translationnotifications-signup-legal' => 'Với việc cung cấp thông tin này, bạn đồng ý cho phép chúng tôi liên lạc với bạn về các đề tài có liên quan đến {{SITENAME}} mà bạn có thể quan tâm đến. Bạn đồng ý rằng dữ liệu của bạn sẽ được sử dụng theo [[{{MediaWiki:Privacypage}}|quy định quyền riêng tư]] của chúng tôi.',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 * @author පසිඳු කාවින්ද
 */
$messages['yi'] = array(
	'translationnotifications-info' => 'באַניצער אינפֿאָרמאַציע',
	'translationnotifications-username' => 'באַניצער־נאָמען:',
	'translationnotifications-emailstatus' => 'ע־פאסט סטאטוס:',
	'translationnotifications-email-confirmed' => 'אייער ע־פאסט אדרעס איז באשטעטיקט',
	'translationnotifications-email-unconfirmed' => 'אייער ע־פאסט אדרעס איז נישט באשטעטיקט: $1',
	'translationnotifications-languages' => 'שפּראַכן',
	'translationnotifications-lang' => 'שפראך #$1',
	'translationnotifications-nolang' => 'קלויבט א שפראך',
	'translationnotifications-cmethod-email' => 'ע-פאסט',
	'translationnotifications-cmethod-talkpage' => 'רעדן בלאַט',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'רעדן בלאט אויף אן אנדער וויקי',
	'translationnotifications-freq-week' => 'העכסטנס איינמאל א וואך',
	'translationnotifications-freq-month' => 'העכסטנס איינמאל א מאנאט',
	'translationnotifications-freq-weekly' => 'וואכנטלעכער באריכט',
	'translationnotifications-freq-monthly' => 'מאנאטלעכער באריכט',
	'translationnotifications-submit' => 'דערהיינטיקן איינשטעלונגען',
	'translationnotifications-priority' => 'פריאריטעט:',
	'translationnotifications-priority-high' => 'הויך',
	'translationnotifications-priority-medium' => 'מיטל',
	'translationnotifications-priority-low' => 'נידעריק',
	'translationnotifications-priority-unset' => '(נישט געשטעלט)',
	'translationnotifications-translatablepage-title' => 'נאמען פון בלאט איבערצוזעצן:',
	'translationnotifications-error-no-translatable-pages' => 'נישטא קיין איבערזעצבארע בלעטער אין דער וויקי.',
	'translationnotifications-email-subject' => 'זייט אזוי גוט זעצט איבער דעם בלאט $1',
	'translationnotifications-email-body' => 'טייערער $1,

איר באקומט דעם ע־פאסט ווייל איר {{GENDER:$10|האט זיך אונטערגשריבן}} ווי אן איבערזעצער {{PLURAL:$9|אויף}} $2 ביי {{SITENAME}}.

עס איז פאראן א בלאט איבערצוזעצן דארט: $3.

איר קענט אים איבערזעצן דורך קליקן אויפן לינק:
$4

$5
$6

$7

אייער הילף ווערט שטארק אפגעשאצט. איבערזעצער ווי איר העלפן {{SITENAME}} פונקציאנירן
ווי אן אמת\'ע פילשפראכיקע געמיינדע.

א ייש"כ!
{{SITENAME}} איבערזעצונג קאארדינאטארן

----

איר באקומט דעם ע־פאסט ווייל איר האט זיך אונטערגעשריבן צו באקומען בליצבריוון מיט א שייכות צו איבערזעצונגען ביי  {{SITENAME}}. זיך אומאבאנירן, אדער צו ענדערן  אייער אנזאג פרעפערענצן פאר איבערזעצונגען, זייט אזוי גוט באזוכט $8.',
	'translationnotifications-talkpage-body' => 'טייערער $2,

איר באקומט דעם ע־פאסט ווייל איר {{GENDER:$1|האט זיך אונטערגשריבן}} ווי אן איבערזעצער {{PLURAL:$9|אויף}} $3 ביי {{SITENAME}}.
ס\'איז פאראן דער בלאט [[$4]] איבערצוזעצן. איר קענט אים איבערזעצן דא:
$5

$6
$7

$8

אייער הילף ווערט שטארק אפגעשאצט. איבערזעצער ווי איר העלפן  {{SITENAME}} פונקציאנירן
ווי אן אמת\'ע פילשפראכיקע געמיינדע.

א ייש"כ!

{{SITENAME}} איבערזעצונג קאארדינאטארן',
	'translationnotifications-notification-url-listitem' => 'איבערזעצן אויף $1',
	'translationnotifications-digestemail-body' => 'טייערער $1,

איר באקומט דעם ע־פאסט ווייל איר {{GENDER:$1|האט זיך אונטערגשריבן}} ווי אן איבערזעצער אויף $2 ביי {{SITENAME}}.

עס  {{PLURAL:$3|איז פאראן 1 בלאט|זענען פאראן $3 בלעטער}} איבערצוזעצן. פרטים קענט איר טרעפן אונטן.

$4

אייער הילף ווערט שטארק אפגעשאצט. איבערזעצער ווי איר העלפן  {{SITENAME}} פונקציאנירן
ווי אן אמת\'ע פילשפראכיקע געמיינדע.

א ייש"כ!
{{SITENAME}} איבערזעצונג אדמיניסטראטארן

----

איר באקומט דעם ע־פאסט ווייל איר האט זיך אונטערגעשריבן צו באקומען בליצבריוון מיט א שייכות צו איבערזעצונגען ביי  {{SITENAME}}. זיך אומאבאנירן, אדער צו ענדערן  אייער אנזאג פרעפערענצן פאר איבערזעצונגען, זייט אזוי גוט באזוכט <$5>.',
	'translationnotifications-digestemail-notification-line' => 'אום $1, האט $2 מארקירט דעם בלאט "$3" פאר איבערזעצן. איר קענט אים איבערזעצן ביי $4.',
	'translationnotifications-edit-summary' => 'איבערזעצונג אנזאג: $1',
	'translationnotifications-email-priority' => 'די פריאריטעט פון דעם בלאט איז $1.',
	'translationnotifications-email-deadline' => 'דער טערמין פאר איבערזעצן דעם בלאט איז $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|האט געשיקט}} אן אנזאג וועגן איבערזעצן בלאט $3; {{PLURAL:$1|שפראך|שפראכן}}: $4; טערמין: $5; פריאריטעט: $6; געשיקט מיט דערפאלג צו {{PLURAL:$7|איין באקומער|$7 באקומער}}, דורכגעפאלן פאר {{PLURAL:$8|איין באקומער|$8 באקומער}}, איבערגעהיפט {{PLURAL:$9|איין באקומער|$9 באקומער}}',
	'log-name-notifytranslators' => 'איבערזעצונג אנזאגן',
	'log-description-notifytranslators' => 'לאגבוך פון אנזאגן געשיקט צו איבערזעצער וועגן איבערזעצבארע בלעטער',
	'translationnotifications-sent-title' => 'איבערזעצונג אנזאג געשיקט',
	'translationnotifications-sent-body' => 'איבערזעצונג אנזאג איז געשיקט געווארן.',
	'translationnotifications-log-alllanguages' => 'אלע שפראַכן',
	'translationnotifications-nodeadline' => 'קיין',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Liangent
 * @author Shirayuki
 */
$messages['zh-hans'] = array(
	'translatorsignup' => '翻译者登记',
	'translatorsignup-summary' => '在这个页面列明您可以翻译的语言，以及您想让我们如何通知您新的翻译请求。',
	'translationnotifications-desc' => '允许翻译者登记以接受翻译通知',
	'translationnotifications-info' => '用户信息',
	'translationnotifications-username' => '用户名：',
	'translationnotifications-emailstatus' => '电子邮件状态：',
	'translationnotifications-email-confirmed' => '您的电子邮件地址已得到确认',
	'translationnotifications-email-disablemail' => '您的电子邮件地址已得到确认，但在[[Special:Preferences|您的参数设置]]中您要求不接收电子邮件。',
	'translationnotifications-email-unconfirmed' => '您的电子邮件地址没有确认。$1',
	'translationnotifications-email-notset' => '您没有提供电子邮件地址。您可以在您的[[Special:Preferences|参数设置]]完成。',
	'translationnotifications-languages' => '语言',
	'translationnotifications-lang' => '语言 #$1',
	'translationnotifications-nolang' => '选择语言',
	'translationnotifications-contact' => '首选联系方式',
	'translationnotifications-cmethod-email' => '电子邮件',
	'translationnotifications-cmethod-talkpage' => '对话页',
	'translationnotifications-cmethod-talkpage-elsewhere' => '其他wiki上的对话页',
	'translationnotifications-cmethod-feed' => '供稿',
	'translationnotifications-frequency' => '联系频率',
	'translationnotifications-freq-always' => '当有新内容需要翻译时',
	'translationnotifications-freq-week' => '最多每周一次',
	'translationnotifications-freq-month' => '最多每月一次',
	'translationnotifications-freq-weekly' => '每周摘要',
	'translationnotifications-freq-monthly' => '每月摘要',
	'translationnotifications-submit' => '更新设置',
	'translationnotifications-signup-success' => '您的翻译通知选项已保存。',
	'notifytranslators' => '通知翻译者',
	'translationnotifications-submit-ok' => '通知已添加到队列并将在后台完成。',
	'translationnotifications-send-notification-button' => '给翻译者发送通知',
	'translationnotifications-deadline-label' => '这个通知指明的截止日期：',
	'translationnotifications-languages-to-notify-label' => '通知的语言：',
	'translationnotifications-languages-to-notify-label-help-message' => '逗号分隔的语言代码，留空以通知所有语言。',
	'translationnotifications-priority' => '优先级：',
	'translationnotifications-priority-high' => '高',
	'translationnotifications-priority-medium' => '中',
	'translationnotifications-priority-low' => '低',
	'translationnotifications-priority-unset' => '（未设置）',
	'translationnotifications-translatablepage-title' => '可翻译页面名：',
	'translationnotifications-error-no-translatable-pages' => '这个wiki中没有可翻译页面。',
	'translationnotifications-email-subject' => '请翻译页面$1',
	'translationnotifications-notification-url-listitem' => '翻译为$1',
	'translationnotifications-digestemail-subject' => '来自{{SITENAME}}的翻译请求的摘要电子邮件',
	'translationnotifications-digestemail-notification-line' => '于$1，$2标记了“$3”为需要翻译。您可以在$4进行翻译',
	'translationnotifications-edit-summary' => '翻译通知：$1',
	'translationnotifications-email-priority' => '这个页面有$1重要度。',
	'translationnotifications-email-deadline' => '翻译这个页面的截止日期是$1。',
	'logentry-translationnotifications-sent' => '$1{{GENDER:$2|发送了}}翻译页面$3的通知；语言：$4；截止日期：$5；重要度：$6；已发送给$7个收件人，给$8个收件人的通知发送失败，跳过了$9个收件人', # Fuzzy
	'log-name-notifytranslators' => '翻译通知',
	'log-description-notifytranslators' => '向翻译者发送可翻译页面通知的日志',
	'translationnotifications-sent-title' => '翻译通知已发送',
	'translationnotifications-sent-body' => '翻译通知已发送。',
	'translationnotifications-log-alllanguages' => '所有语言',
	'translationnotifications-nodeadline' => '无',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Justincheng12345
 * @author Liangent
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'translatorsignup' => '翻譯者登記',
	'translatorsignup-summary' => '在這個頁面列明您可以翻譯的語言，以及您想讓我們如何通知您新的翻譯請求。',
	'translationnotifications-desc' => '允許翻譯者登記以接受翻譯通知',
	'translationnotifications-info' => '用戶信息',
	'translationnotifications-username' => '用戶名：',
	'translationnotifications-emailstatus' => '電子郵件狀態：',
	'translationnotifications-email-confirmed' => '用戶的電郵地址已經確認',
	'translationnotifications-email-disablemail' => '您的電子郵件地址已得到確認，但在[[Special:Preferences|您的參數設置]]中您要求不接收電子郵件。',
	'translationnotifications-email-unconfirmed' => '您的電子郵件地址沒有確認。$1',
	'translationnotifications-email-notset' => '您沒有提供電子郵件地址。您可以在您的[[Special:Preferences|參數設置]]完成。',
	'translationnotifications-languages' => '語言',
	'translationnotifications-lang' => '語言#$1',
	'translationnotifications-nolang' => '選擇語言',
	'translationnotifications-contact' => '首選聯繫方式',
	'translationnotifications-cmethod-email' => '電子郵件',
	'translationnotifications-cmethod-talkpage' => '對話頁',
	'translationnotifications-cmethod-talkpage-elsewhere' => '其他wiki上的對話頁',
	'translationnotifications-cmethod-feed' => '供稿',
	'translationnotifications-frequency' => '聯繫頻率',
	'translationnotifications-freq-always' => '當有新內容需要翻譯時',
	'translationnotifications-freq-week' => '最多每週一次',
	'translationnotifications-freq-month' => '最多每月一次',
	'translationnotifications-freq-weekly' => '每周摘要',
	'translationnotifications-freq-monthly' => '每月摘要',
	'translationnotifications-submit' => '更新設置',
	'translationnotifications-signup-success' => '您的翻譯通知選項已保存。',
	'notifytranslators' => '通知翻譯者',
	'translationnotifications-submit-ok' => '通知已添加到隊列並將在後台完成。',
	'translationnotifications-send-notification-button' => '給翻譯者發送通知',
	'translationnotifications-deadline-label' => '這個通知指明的截止日期：',
	'translationnotifications-languages-to-notify-label' => '通知的語言：',
	'translationnotifications-languages-to-notify-label-help-message' => '逗號分隔的語言代碼，留空以通知所有語言。',
	'translationnotifications-priority' => '優先級：',
	'translationnotifications-priority-high' => '高',
	'translationnotifications-priority-medium' => '中',
	'translationnotifications-priority-low' => '低',
	'translationnotifications-priority-unset' => '（未設置）',
	'translationnotifications-translatablepage-title' => '可翻譯頁面名：',
	'translationnotifications-error-no-translatable-pages' => '這個wiki中沒有可翻譯頁面。',
	'translationnotifications-email-subject' => '請翻譯頁面$1',
	'translationnotifications-email-body' => '$1：

閣下因已於{{SITENAME}}登記成為$2（共$9項）的翻譯者而收到此封郵件。

這裡有一頁需要您協助翻譯：$3。
您可以按以下的連結來進行翻譯：
$4

$5
$6

$7

非常感謝您的幫助。像閣下一樣的翻譯者使{{SITENAME}}真正成為一多語言社群。

多謝！

　　此致
$1

{{SITENAME}}翻譯協調員

----

您因已登記翻譯{{SITENAME}}而收到此電郵。要取消訂閱或更改設置請到$8。',
	'translationnotifications-talkpage-body' => '$2：

閣下因已於{{SITENAME}}{{GENDER:$1|登記}}成為$3（共$9項）的翻譯者而收到此通知。

這裡有一頁需要您協助翻譯：[[$4]]現已可供翻譯。您可以按以下的連結來進行翻譯：
$5

$6
$7

$8

非常感謝您的幫助。像閣下一樣的翻譯者使{{SITENAME}}真正成為一多語言社群。

多謝！

{{SITENAME}}翻譯協調員',
	'translationnotifications-notification-url-listitem' => '翻譯為$1',
	'translationnotifications-digestemail-subject' => '來自{{SITENAME}}的翻譯請求的摘要電子郵件',
	'translationnotifications-digestemail-body' => '$1：

閣下因已於{{SITENAME}}登記成為$2的翻譯者而收到此通知。

這裡有$3頁需要您協助翻譯，詳情如下：
$4

非常感謝您的幫助。像閣下一樣的翻譯者使{{SITENAME}}真正成為一多語言社群。

多謝！

{{SITENAME}}翻譯協調員 謹啟

----

您因已登記翻譯{{SITENAME}}而收到此電郵。要取消訂閱或更改設置請往 < $5>。',
	'translationnotifications-digestemail-notification-line' => '於$1，$2標記了“$3”為需要翻譯。您可以在$4進行翻譯',
	'translationnotifications-edit-summary' => '翻譯通知：$1',
	'translationnotifications-email-priority' => '這個頁面有$1重要度。',
	'translationnotifications-email-deadline' => '翻譯這個頁面的截止日期是$1。',
	'logentry-translationnotifications-sent' => '$1{{GENDER:$2|發送了}}翻譯頁面$3的通知；語言：$4；截止日期：$5；重要度：$6；已發送給$7個收件人，給$8個收件人的通知發送失敗，跳過了$9個收件人',
	'log-name-notifytranslators' => '翻譯通知',
	'log-description-notifytranslators' => '向翻譯者發送可翻譯頁面通知的日誌',
	'translationnotifications-sent-title' => '翻譯通知已發送',
	'translationnotifications-sent-body' => '翻譯通知已發送。',
	'translationnotifications-log-alllanguages' => '所有語言',
	'translationnotifications-nodeadline' => '無',
	'translationnotifications-signup-legal' => '您同意若提供此資訊，我們可能就有關{{SITENAME}}，而我們又認為您感興趣的主題與您聯繫。您同意您的資料將按照[[{{MediaWiki:Privacypage}}|私隱攻策]]處理。',
);
