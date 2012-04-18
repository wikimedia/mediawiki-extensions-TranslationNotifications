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
	'translationnotifications-desc' => 'Allows translators sign up for translation notifications',
	'translationnotifications-info' => 'User information',
	'translationnotifications-username' => 'Username:',
	'translationnotifications-emailstatus' => 'E-mail status:',
	'translationnotifications-email-confirmed' => 'Your e-mail address is confirmed',
	'translationnotifications-email-unconfirmed' => 'Your e-mail address is not confirmed. $1',
	'translationnotifications-email-notset' => 'You have not provided an e-mail address. You can do that in your [[Special:Preferences|preferences]].',
	'translationnotifications-languages' => 'Languages',
	'translationnotifications-lang' => 'Language #$1',
	'translationnotifications-nolang' => 'Choose a language',
	'translationnotifications-contact' => 'Preferred contact methods',
	'translationnotifications-cmethod-email' => 'E-mail',
	'translationnotifications-cmethod-talkpage' => 'Talk page',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Talk page on other wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Contact frequency',
	'translationnotifications-freq-always' => 'When there is something new to translate',
	'translationnotifications-freq-week' => 'At most once a week',
	'translationnotifications-freq-month' => 'At most once a month',
	'translationnotifications-freq-weekly' => 'Weekly digest',
	'translationnotifications-freq-monthly' => 'Monthly digest',
	'translationnotifications-submit' => 'Sign up',

	// Special:Notify translators
	'notifytranslators' => 'Notify translators',
	'translationnotifications-send-notification-button' => 'Send a notification to translators',
	'translationnotifications-deadline-label' => 'Deadline to indicate in this notification:',
	'translationnotifications-languages-to-notify-label' => 'Which languages to notify (comma-separated codes):',
	'translationnotifications-priority' => 'Priority:',
	'translationnotifications-priority-high' => 'high',
	'translationnotifications-priority-medium' => 'medium',
	'translationnotifications-priority-low' => 'low',
	'translationnotifications-priority-unset' => '(unset)',
	'translationnotifications-translatablepage-title' => 'Translatable page name:',
	'translationnotifications-error-no-translatable-pages' => 'There are no translatable pages in this wiki.',
	'translationnotifications-email-subject' => 'Please translate the page $1',
	'translationnotifications-email-body' => 'Hello $1,

You are receiving this e-mail because you signed up as a translator to $2 on {{SITENAME}}.

There is a new page to translate there: $3.
Please translate it by clicking the following link:
$4

$5
$6

$7

Thank you!
{{SITENAME}} staff',
	'translationnotifications-talkpage-body' => '== $1 ==

Hello $2,

You are receiving this notification because you signed up as a translator to $3 on {{SITENAME}}.
A new page, [[$4]] is available for translation. Please translate it by clicking the following link:

$5

$6
$7

$8

Thank you!

{{SITENAME}} staff',
	'translationnotifications-edit-summary' => 'Translation notification',
	'translationnotifications-email-priority' => 'The priority of this page is $1.',
	'translationnotifications-email-deadline' => 'The deadline for translating this page is $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|sent}} a notification about translating page $3; languages: $4; deadline: $5; priority: $6; sent to {{PLURAL:$7|one recipient|$7 recipients}}, failed for {{PLURAL:$8|one recipient|$8 recipients}}, skipped for {{PLURAL:$9|one recipient|$9 recipients}}',
	'log-name-notifytranslators' => 'Translation notifications',
	'log-description-notifytranslators' => 'A log of notifications sent to translators about translatable pages',
	'translationnotifications-sent-title' => 'Translation notification sent',
	'translationnotifications-sent-body' => 'Translation notification was sent.',
	'translationnotifications-log-alllanguages' => 'all languages',
	'translationnotifications-nodeadline' => 'none',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Kghbln
 * @author Raymond
 * @author Siebrand
 */
$messages['qqq'] = array(
	'translatorsignup' => 'Special page header',
	'translatorsignup-summary' => 'Text on top of Special:TranslatorSignup.',
	'translationnotifications-desc' => '{{desc}}',
	'translationnotifications-info' => 'Fieldset header',
	'translationnotifications-username' => 'Label followed by username',
	'translationnotifications-emailstatus' => 'Label',
	'translationnotifications-email-confirmed' => 'Status of e-mail confirmation after {{msg-mw|translationnotifications-emailstatus}}.',
	'translationnotifications-email-unconfirmed' => 'Status of e-mail confirmation after {{msg-mw|translationnotifications-emailstatus}}. Parameters:
* $1 is a button which can be used to send confirmation email. Button text is {{msg-mw|mediawiki:confirmemail_send}}.',
	'translationnotifications-email-notset' => 'Status of e-mail confirmation after {{msg-mw|translationnotifications-emailstatus}}.',
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
	'notifytranslators' => 'The title of the Special:NotifyTranslators special page.',
	'translationnotifications-send-notification-button' => 'A title for the submit button of the translator notification form.',
	'translationnotifications-deadline-label' => 'A label for the deadline field, which will have a datepicker.',
	'translationnotifications-languages-to-notify-label' => 'A label for language codes field.',
	'translationnotifications-priority' => 'A label for translation priority field.',
	'translationnotifications-priority-high' => 'high (priority), an item in a dropdown box.',
	'translationnotifications-priority-medium' => 'medium (priority), an item in a dropdown box.',
	'translationnotifications-priority-low' => 'low (priority), an item in a dropdown box.',
	'translationnotifications-priority-unset' => 'unset (priority), an item in a dropdown box.',
	'translationnotifications-translatablepage-title' => 'A label for language codes field. Can be translated as "A page designated for translation, intended for translation", etc.',
	'translationnotifications-error-no-translatable-pages' => 'An error message.',
	'translationnotifications-email-subject' => 'A subject for the email sent to translators.',
	'translationnotifications-email-body' => "The body of the email message sent to translators.

* $1 - Translator's username or real name, if specified.
* $2 - Language name.
* $3 - Translatable page name.
* $4 - URL.
* $5 - The message {{msg-mw|translationnotifications-email-priority}}. Empty if no priority was specified.
* $6 - The message {{msg-mw|translationnotifications-email-deadline}}. Empty if no deadline was specified.
* $7 - A custom message that can be added by the notification sender.",
	'translationnotifications-talkpage-body' => "The body of the  notification on user talk page.

* $1 - Title of the notification section..
* $2 - Translator's username or real name, if specified.
* $3 - Language name.
* $4 - Translatable page name.
* $5 - URL.
* $6 - The message {{msg-mw|translationnotifications-email-priority}}. Empty if no priority was specified.
* $7 - The message {{msg-mw|translationnotifications-email-deadline}}. Empty if no deadline was specified.
* $8 - A custom message that can be added by the notification sender.",
	'translationnotifications-edit-summary' => 'The edit summary for the notification text added to the user talk page.',
	'translationnotifications-email-priority' => 'Used in {{msg-mw|translationnotifications-email-body}}',
	'translationnotifications-email-deadline' => 'Used in {{msg-mw|translationnotifications-email-body}}',
	'logentry-translationnotifications-sent' => '{{logentry}}
* $1 - username
* $2 - username for gender
* $3 - translatable page title
* $4 - languages list
* $5 - deadline
* $6 - priority
* $7 - number of recipients to whom the notification was sent successfully
* $8 - number of recipients to whom sending the notification failed',
	'log-name-notifytranslators' => 'Log page title.',
	'log-description-notifytranslators' => 'Log page description',
	'translationnotifications-sent-title' => 'The title of the page shown after the notification is sent.
Similar to {{msg-mw|emailsent}}.',
	'translationnotifications-log-alllanguages' => 'Appears in the log message, saying that the notification was sent to translators to all languages.',
	'translationnotifications-nodeadline' => 'Appears in the log message, saying that no deadline was specified.',
);

/** Ṫuroyo (Ṫuroyo)
 * @author Ariyo
 */
$messages['tru'] = array(
	'translationnotifications-languages' => 'Leşone',
	'translationnotifications-lang' => 'Leşono $1',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'translatorsignup' => 'Падпіскі перакладчыка',
	'translationnotifications-desc' => 'Дазваляе перакладчыкам падпісвацца на паведамленьні пра пераклады',
	'translationnotifications-info' => 'Зьвесткі карыстальніка',
	'translationnotifications-username' => 'Імя ўдзельніка:',
	'translationnotifications-emailstatus' => 'Стан e-mail:',
	'translationnotifications-email-confirmed' => 'Ваш адрас e-mail пацьверджаны',
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
	'translationnotifications-cmethod-no' => 'Не паведамляць мне',
	'translationnotifications-frequency' => 'Частасьць паведамленьняў',
	'translationnotifications-freq-always' => 'Калі зьяўляецца, што перакладаць',
	'translationnotifications-freq-week' => 'Ня болей разу на тыдзень',
	'translationnotifications-freq-month' => 'Ня болей разу на месяц',
	'translationnotifications-freq-weekly' => 'Тыднёвы дайджэст',
	'translationnotifications-freq-monthly' => 'Месячны дайджэст',
	'translationnotifications-submit' => 'Падпісацца',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'translationnotifications-info' => 'Titouroù diwar-benn un implijer',
	'translationnotifications-username' => 'Anv implijer :',
	'translationnotifications-email-confirmed' => "Kadarnaet eo bet ho chomlec'h postel",
	'translationnotifications-email-unconfirmed' => "N'eo ket bet kadarnaet ho chomlec'h postel. $1",
	'translationnotifications-languages' => 'Yezhoù',
	'translationnotifications-lang' => 'Yezh #$1',
	'translationnotifications-nolang' => 'Dibabit ur yezh',
	'translationnotifications-cmethod-email' => 'Postel',
	'translationnotifications-cmethod-talkpage' => 'Pajenn gaozeal',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Pajenn gaozeal war wikioù all',
	'translationnotifications-submit' => 'En em enskrivañ',
);

/** German (Deutsch)
 * @author Geitost
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'translatorsignup' => 'Übersetzerregistrierung',
	'translatorsignup-summary' => 'Nutze diese Seite um anzugeben in welche Sprachen du übersetzen kannst und wie du bei Übersetzungsanfragen benachrichtigt werden möchtest.',
	'translationnotifications-desc' => 'Ermöglicht es Übersetzern Übersetzungsbenachrichtigungen zu abonnieren',
	'translationnotifications-info' => 'Benutzerinformation',
	'translationnotifications-username' => 'Benutzername:',
	'translationnotifications-emailstatus' => 'E-Mail-Status:',
	'translationnotifications-email-confirmed' => 'Deine E-Mail-Adresse ist bestätigt',
	'translationnotifications-email-unconfirmed' => 'Deine E-Mail-Adresse ist nicht bestätigt. $1',
	'translationnotifications-email-notset' => 'Du hast keine E-Mail-Adresse angegeben. Dies kannst du in deinen [[Special:Preferences|Einstellungen]] tun.',
	'translationnotifications-languages' => 'Sprachen',
	'translationnotifications-lang' => 'Sprache Nr. $1',
	'translationnotifications-nolang' => 'Wähle eine Sprache',
	'translationnotifications-contact' => 'Bevorzugte Benachrichtigungsmethoden',
	'translationnotifications-cmethod-email' => 'E-Mail',
	'translationnotifications-cmethod-talkpage' => 'Diskussionsseite',
	'translationnotifications-cmethod-talkpage-elsewhere' => 'Diskussionsseite auf einem anderen Wiki',
	'translationnotifications-cmethod-feed' => 'Feed',
	'translationnotifications-frequency' => 'Benachrichtigungshäufigkeit',
	'translationnotifications-freq-always' => 'Immer, wenn neue Übersetzungen vorhanden sind',
	'translationnotifications-freq-week' => 'Höchstens einmal pro Woche',
	'translationnotifications-freq-month' => 'Höchstens einmal pro Monat',
	'translationnotifications-freq-weekly' => 'Wöchentlicher Bericht',
	'translationnotifications-freq-monthly' => 'Monatlicher Bericht',
	'translationnotifications-submit' => 'Registrieren',
	'notifytranslators' => 'Übersetzer benachrichtigen',
	'translationnotifications-send-notification-button' => 'Benachrichtigung an die Übersetzer senden',
	'translationnotifications-deadline-label' => 'In der Benachrichtigung anzugebenden Frist:',
	'translationnotifications-languages-to-notify-label' => 'Die zu benachrichtigenden Sprachen (Code, kommagetrennt):',
	'translationnotifications-priority' => 'Priorität:',
	'translationnotifications-priority-high' => 'hoch',
	'translationnotifications-priority-medium' => 'mittel',
	'translationnotifications-priority-low' => 'niedrig',
	'translationnotifications-priority-unset' => '(nicht gesetzt)',
	'translationnotifications-translatablepage-title' => 'Name der zu übersetzenden Seite:',
	'translationnotifications-error-no-translatable-pages' => 'Es gibt in diesem Wiki keine zu übersetzenden Seiten.',
	'translationnotifications-email-subject' => 'Bitte übersetze die Seite $1.',
	'translationnotifications-email-body' => 'Hallo $1,

du erhältst diese E-Mail, da du dich als Übersetzer(in) für $2 auf {{SITENAME}} registriert hast.

An folgender Stelle ist eine neue Seite zum Übersetzen vorhanden: $3.
Übersetze sie bitte nach dem Klicken auf den folgenden Link:
$4

$5
$6

$7

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Hallo $2,

du erhältst diese E-Mail, da du dich als Übersetzer(in) für $3 auf {{SITENAME}} registriert hast.
Eine neue Seite, [[$4]], ist zum Übersetzen vorhanden. Übersetze sie bitte nach dem Klicken auf den folgenden Link:

$5

$6
$7

$8

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Übersetzungsbenachrichtigung',
	'translationnotifications-email-priority' => 'Die Übersetzungspriorität dieser Seite ist $1.',
	'translationnotifications-email-deadline' => 'Die Frist zur Übersetzung dieser Seite läuft bis zum $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|sandte}} eine Benachrichtigung bezüglich der Übersetzung von Seite $3 in die Sprachen $4, mit der Frist $5 und der Priorität $6, erfolgreich an {{PLURAL:$7|einen Empfänger|$7 Empfänger}} und erfolglos an {{PLURAL:$8|einen Empfänger|$8 Empfänger}}, wobei {{PLURAL:$9|eine Empfänger nicht angeschrieben wurde|$9 Empfänger nicht angeschrieben wurden}}.',
	'log-name-notifytranslators' => 'Übersetzungsbenachrichtigungs-Logbuch',
	'log-description-notifytranslators' => 'Das Logbuch der Benachrichtigungen, die bezüglich übersetzbarer Seiten an die Übersetzer gesandt wurden.',
	'translationnotifications-sent-title' => 'Übersetzungsbenachrichtigung verschickt',
	'translationnotifications-sent-body' => 'Die Übersetzungsbenachrichtigung wurde verschickt.',
	'translationnotifications-log-alllanguages' => 'alle Sprachen',
	'translationnotifications-nodeadline' => 'keine',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Geitost
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'translatorsignup-summary' => 'Nutzen Sie diese Seite um anzugeben in welche Sprachen Sie übersetzen können und wie Sie bei Übersetzungsanfragen benachrichtigt werden möchten.',
	'translationnotifications-email-confirmed' => 'Ihre E-Mail-Adresse ist bestätigt',
	'translationnotifications-email-unconfirmed' => 'Ihre E-Mail-Adresse ist nicht bestätigt. $1',
	'translationnotifications-email-notset' => 'Sie haben keine E-Mail-Adresse angegeben. Dies können Sie in Ihren [[Special:Preferences|Einstellungen]] tun.',
	'translationnotifications-nolang' => 'Wählen Sie eine Sprache',
	'translationnotifications-email-subject' => 'Bitte übersetzen Sie die Seite $1.',
	'translationnotifications-email-body' => 'Hallo $1,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für $2 auf {{SITENAME}} registriert haben.

An folgender Stelle ist eine neue Seite zum Übersetzen vorhanden: $3.
Übersetzen Sie sie bitte nach dem Klicken auf den folgenden Link:
$4

$5
$6

$7

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Hallo $2,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für $3 auf {{SITENAME}} registriert haben.
Eine neue Seite, [[$4]], ist zum Übersetzen vorhanden. Übersetzen Sie sie bitte nach dem Klicken auf den folgenden Link:

$5

$6
$7

$8

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translatorsignup' => 'Registrěrowanje pśełožowarja',
	'translationnotifications-desc' => 'Zmóžnja registrěrowanje pśełožowarjow za pśełožowańske powěźeńki',
	'translationnotifications-info' => 'Wužywarske informacije',
	'translationnotifications-username' => 'Wužywarske mě:',
	'translationnotifications-emailstatus' => 'E-mailowy status',
	'translationnotifications-email-confirmed' => 'Twója e-mailowa adresa jo wobkšuśona',
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
	'translationnotifications-submit' => 'Registrěrowaś',
	'notifytranslators' => 'Pśełožowarjow informěrowaś',
	'translationnotifications-send-notification-button' => 'Pśełožowarjam powěźeńku pósłaś',
	'translationnotifications-deadline-label' => 'Termin, kótaryž musy se w toś tej powěźeńce pódaś:',
	'translationnotifications-languages-to-notify-label' => 'Rěcy, kótarež maju se informěrowaś (pśez komu źělone kody):',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'wusoka',
	'translationnotifications-priority-medium' => 'srědna',
	'translationnotifications-priority-low' => 'niska',
	'translationnotifications-priority-unset' => '(njenastajona)',
	'translationnotifications-translatablepage-title' => 'Mě pśełožujobnego boka:',
	'translationnotifications-error-no-translatable-pages' => 'W toś tom wikiju žedne pśełožujobne boki njejsu.',
	'translationnotifications-email-subject' => 'Pšosym pśełož bok $1',
	'translationnotifications-email-body' => 'Witaj $1,

Dostawaš toś tu e-mail, dokulaž sy se ako pśełožowaŕ za $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrěrował.

Dajo nowy bok, kótaryž musy se pśełožowaś: $3.
Pšosym pśełož jen, z tym až kliknjoš na slědujucy wótkaz:
$4

$5
$6

$7

Wjeliki źěk!
Team {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'translationnotifications-email-priority' => 'Priorita toś togo boka jo $1.',
	'translationnotifications-email-deadline' => 'Termin za pśełožowanje toś togo boka jo $1.',
	'logentry-translationnotifications-sent' => '$1 jo powěźeńku wó pśełožowańskem boku $3 do rěcy $4 z terminom $5, z prioritu $6, na {{PLURAL:$7|jadnogo dostawarja|$7 dostawarjowu|$7 dostawarjow|$7 dostawarjow}} wuspěšnje {{GENDER:$2|pósłał|pósłała}}, a na {{PLURAL:$8|jadnogo dostawarja|$8 dostawarjowu|$8 dostawarjow|$8 dostawarjow}} njewuspěšnje.',
	'log-name-notifytranslators' => 'Pśełožowańske powěźeńki',
	'translationnotifications-sent-title' => 'Pśełožowańska powěźeńka jo se pósłała',
	'translationnotifications-sent-body' => 'Pśełožowańska powěźeńka jo se pósłała.',
);

/** Spanish (Español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'translatorsignup' => 'Inscripción de traductores',
	'translationnotifications-desc' => 'Permite a los traductores registrarse para recibir notificaciones de traducción',
	'translationnotifications-info' => 'Información de usuario',
	'translationnotifications-username' => 'Nombre de usuario:',
	'translationnotifications-emailstatus' => 'Estado de correo electrónico:',
	'translationnotifications-email-confirmed' => 'Su dirección de correo electrónico está confirmada',
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
	'translationnotifications-submit' => 'Regístrese',
	'notifytranslators' => 'Notificar a los traductores',
	'translationnotifications-send-notification-button' => 'Enviar una notificación a los traductores',
	'translationnotifications-deadline-label' => 'Fecha límite a indicar en esta notificación:',
	'translationnotifications-languages-to-notify-label' => 'Idiomas en los que notificar (códigos de idioma separados por comas)',
	'translationnotifications-priority' => 'Prioridad:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'media',
	'translationnotifications-priority-low' => 'baja',
	'translationnotifications-priority-unset' => '(no definida)',
	'translationnotifications-translatablepage-title' => 'Nombre de la página traducible:',
	'translationnotifications-error-no-translatable-pages' => 'No hay páginas traducibles en este wiki.',
	'translationnotifications-email-subject' => 'Por favor traduzca la página $1',
	'translationnotifications-email-body' => 'Hola  $1 ,

Está recibiendo este mensaje porque se inscribió como traductor al idioma  $2  de {{SITENAME}}.

Hay una nueva página para traducir:  $3.
Por favor tradúzcala haciendo clic en el vínculo siguiente:
$4

$5
$6

$7
¡Gracias!
El equipo de {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Hola  $2,

Usted está recibiendo esta notificación porque se inscribió como traductor  de {{SITENAME}} al  $3.

Una nueva página, [[$4]] está disponible para su traducción. Por favor tradúzcala haciendo clic en el enlace siguiente:

$5

$6
$7

$8

¡Gracias!

El equipo de {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Notificación de traducción',
	'translationnotifications-email-priority' => 'La prioridad de esta página es  $1.',
	'translationnotifications-email-deadline' => 'La fecha límite para la traducción de esta página es  $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|ha enviado}} una notificación sobre la traducción de la página $3; idiomas: $4; fecha límite: $5; prioridad: $6; ha llegado a {{PLURAL:$7|un destinatario|$7  destinatarios}}, ha fallado en {{PLURAL:$8|un destinatario|$8 destinatarios}}, ha omitido a {{PLURAL:$9|un destinatario|$9 destinatarios}}',
	'log-name-notifytranslators' => 'Notificaciones de traducción',
	'log-description-notifytranslators' => 'Un registro de las notificaciones enviadas a los traductores sobre las páginas traducibles',
	'translationnotifications-sent-title' => 'Notificación de traducción enviada',
	'translationnotifications-sent-body' => 'Se ha enviado la notificación de traducción.',
	'translationnotifications-log-alllanguages' => 'todos los idiomas',
	'translationnotifications-nodeadline' => 'ninguno',
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'translatorsignup' => 'Connexion du traducteur',
	'translationnotifications-desc' => "Permet aux traducteurs de s'inscrire pour des notifications de traduction",
	'translationnotifications-info' => "Information sur l'utilisateur",
	'translationnotifications-username' => "Nom de l'utilisateur:",
	'translationnotifications-emailstatus' => 'État du courriel:',
	'translationnotifications-email-confirmed' => 'Votre adresse de courriel est confirmée',
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
	'translationnotifications-submit' => 'Inscription',
	'notifytranslators' => 'Informer les traducteurs',
	'translationnotifications-send-notification-button' => 'Envoyer une notification aux traducteurs',
	'translationnotifications-deadline-label' => 'Date limite à indiquer dans cette notification:',
	'translationnotifications-languages-to-notify-label' => 'Quelles langues pour notifier (codes séparés par des virgules):',
	'translationnotifications-priority' => 'Priorité:',
	'translationnotifications-priority-high' => 'haute',
	'translationnotifications-priority-medium' => 'moyenne',
	'translationnotifications-priority-low' => 'basse',
	'translationnotifications-priority-unset' => '(non défini)',
	'translationnotifications-translatablepage-title' => 'Nom de la page à traduire:',
	'translationnotifications-error-no-translatable-pages' => "Il n'y a aucune page à traduire dans ce wiki.",
	'translationnotifications-email-subject' => 'Veuillez traduire la page $1',
	'translationnotifications-email-body' => "Bonjour, $1

Vous avez reçu ce courriel parce que vous vous êtes inscrit comme traducteur de $2 sur {{SITENAME}}.

Il y a une nouvelle page à traduire ici: $3.
Veuillez la traduire en cliquant sur le lien suivant:
$4

$5
$6

$7

Merci!
L'équipe de {{SITENAME}}",
	'translationnotifications-talkpage-body' => "== $1 ==

Bonjour $2,

Vous recevez cette notification parce que vous êtes inscrit comme traducteur de $3 sur {{SITENAME}}.
Une nouvelle page, [[$4]], est disponible pour la traduction. Veuillez la traduite en cliquant sur le lien suivant:

$5

$6
$7

$8

Merci!

L'équipe de {{SITENAME}}",
	'translationnotifications-edit-summary' => 'Notification de traduction',
	'translationnotifications-email-priority' => 'La priorité de cette page est $1.',
	'translationnotifications-email-deadline' => 'La date limite pour traduire cette page est $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|a envoyé}} une notification sur la traduction de la page $3; langues: $4; délai limite: $5; priorité: $6; à {{PLURAL:$7|un destinataire|$7 destinataires}} avec succès, à {{PLURAL:$8|un destinataire|$8 destinataires}} sans succès',
	'log-name-notifytranslators' => 'Notifications de traduction',
	'log-description-notifytranslators' => 'Un journal des notifications envoyées aux traducteurs sur les pages à traduire',
	'translationnotifications-sent-title' => 'Notification de traduction envoyée',
	'translationnotifications-sent-body' => 'La notification de la traduction a été envoyée.',
	'translationnotifications-log-alllanguages' => 'toutes les langues',
	'translationnotifications-nodeadline' => 'aucun',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'translatorsignup' => 'Inscrición de tradutores',
	'translationnotifications-desc' => 'Permite aos tradutores inscribirse para recibir notificacións sobre as traducións',
	'translationnotifications-info' => 'Información de usuario',
	'translationnotifications-username' => 'Nome de usuario:',
	'translationnotifications-emailstatus' => 'Estado do correo electrónico:',
	'translationnotifications-email-confirmed' => 'O seu enderezo de correo electrónico está confirmado',
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
	'translationnotifications-submit' => 'Inscribirse',
	'notifytranslators' => 'Informar aos tradutores',
	'translationnotifications-send-notification-button' => 'Enviar unha notificación aos tradutores',
	'translationnotifications-deadline-label' => 'Data límite a indicar nesta notificación:',
	'translationnotifications-languages-to-notify-label' => 'Linguas ás que enviar a notificación (códigos separados por comas):',
	'translationnotifications-priority' => 'Prioridade:',
	'translationnotifications-priority-high' => 'alta',
	'translationnotifications-priority-medium' => 'media',
	'translationnotifications-priority-low' => 'baixa',
	'translationnotifications-priority-unset' => '(non definida)',
	'translationnotifications-translatablepage-title' => 'Nome da páxina traducible:',
	'translationnotifications-error-no-translatable-pages' => 'Non hai páxinas que se poidan traducir neste wiki.',
	'translationnotifications-email-subject' => 'Por favor, traduza a páxina "$1"',
	'translationnotifications-email-body' => 'Boas, $1:

Recibiu este correo electrónico porque está inscrito como tradutor ao $2 en {{SITENAME}}.

Hai unha nova páxina que traducir alí: $3.
Tradúzaa premendo na seguinte ligazón:
$4

$5
$6

$7

Grazas!
O equipo de {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Boas, $2:

Recibiu esta notificación porque está inscrito como tradutor ao $3 en {{SITENAME}}.
Hai unha nova páxina, "[[$4]]", dispoñible para a súa tradución. Tradúzaa premendo na seguinte ligazón:

$5

$6
$7

$8

Grazas!

O equipo de {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Notificación de tradución',
	'translationnotifications-email-priority' => 'A prioridade desta páxina é $1.',
	'translationnotifications-email-deadline' => 'A data límite para traducir a páxina é $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|enviou}} correctamente unha notificación sobre a tradución da páxina "$3"; linguas: $4; data límite: $5; prioridade: $6; {{PLURAL:$7|recibiuna un destinatario|recibírona $7 destinatarios}}; {{PLURAL:$8|outro destinatario non a recibiu|outros $8 destinatarios non a recibiron}}',
	'log-name-notifytranslators' => 'Notificacións de tradución',
	'log-description-notifytranslators' => 'Un rexistro das notificacións enviadas aos tradutores sobre a tradución de páxinas',
	'translationnotifications-sent-title' => 'Notificación de tradución enviada',
	'translationnotifications-sent-body' => 'Enviouse a notificación de tradución.',
	'translationnotifications-log-alllanguages' => 'todas as linguas',
	'translationnotifications-nodeadline' => 'ningunha',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'translatorsignup' => 'רישום מתרגמים',
	'translationnotifications-desc' => 'רישום מתרגמים לעדכונים על מיזמי תרגום',
	'translationnotifications-info' => 'מידע על המשתמש',
	'translationnotifications-username' => 'שם משתמש:',
	'translationnotifications-emailstatus' => 'מצב דוא"ל:',
	'translationnotifications-email-confirmed' => 'הדוא"ל שלך מאומת',
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
	'translationnotifications-submit' => 'רישום',
	'notifytranslators' => 'מכתבים למתרגמים',
	'translationnotifications-send-notification-button' => 'שליחת מכתבים למתרגמים',
	'translationnotifications-deadline-label' => 'תאריך סופי שיתווסף להודעה:',
	'translationnotifications-languages-to-notify-label' => 'רשימת שפות שהמתרגמים אליהן יקבלו את ההודעה (קודים מופרדים בפסיקים):',
	'translationnotifications-priority' => 'עדיפות:',
	'translationnotifications-priority-high' => 'גבוהה',
	'translationnotifications-priority-medium' => 'בינונית',
	'translationnotifications-priority-low' => 'נמוכה',
	'translationnotifications-priority-unset' => '(בלתי־מוגדרת)',
	'translationnotifications-translatablepage-title' => 'שם הדף לתרגום:',
	'translationnotifications-error-no-translatable-pages' => 'אין דפים לתרגום בוויקי הזה.',
	'translationnotifications-email-subject' => 'נא לתרגם את הדף $1',
	'translationnotifications-email-body' => 'שלום $1,

קיבלת את המכתב הזה כי נרשמת בתור מתרגם ל$2 באתר {{SITENAME}}.

יש שם דף חדש שצריך לתרגם: $3.
אפשר לתרגם אותו על־ידי לחיצה על הקישור הבא:
$4

$5
$6
$7

תודה!
צוות {{SITENAME}}',
	'translationnotifications-email-priority' => 'העדיפות של הדף הזה: $1.',
	'translationnotifications-email-deadline' => 'התאריך הסופי לתרגום הדף הזה הוא $1.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'translatorsignup' => 'Registrowanje přełožowarja',
	'translationnotifications-desc' => 'Zmóžnja registrowanje přełožowarjow za přełožowanske zdźělenja',
	'translationnotifications-info' => 'Wužiwarske informacije',
	'translationnotifications-username' => 'Wužiwarske mjeno:',
	'translationnotifications-emailstatus' => 'E.mejlowy status:',
	'translationnotifications-email-confirmed' => 'Twoja e-mejlowa adresa je so wobkrućiła',
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
	'translationnotifications-submit' => 'Registrować',
	'notifytranslators' => 'Přełožowarjow informować',
	'translationnotifications-send-notification-button' => 'Přełožowarjam zdźělenku pósłać',
	'translationnotifications-deadline-label' => 'Termin, kotryž dyrbi so w tutej zdźělence podać:',
	'translationnotifications-languages-to-notify-label' => 'Rěče, kotrež maja so informować (přez komu dźělene kody):',
	'translationnotifications-priority' => 'Priorita:',
	'translationnotifications-priority-high' => 'wysoka',
	'translationnotifications-priority-medium' => 'srjedźna',
	'translationnotifications-priority-low' => 'niska',
	'translationnotifications-priority-unset' => '(njenastajena)',
	'translationnotifications-translatablepage-title' => 'Mjeno přełožujomneje strony:',
	'translationnotifications-error-no-translatable-pages' => 'W tutym wikiju žane přełožujomne strony njejsu.',
	'translationnotifications-email-subject' => 'Prošu přełož stronu $1',
	'translationnotifications-email-body' => 'Witaj $1,

Dóstawaš tutu e-mejl, dokelž sy so jako přełožowar za $2 na {{GRAMMAR:lokatiw|{{SITENAME}}}} zregistrował.

Je nowa strona, kotraž dyrbi so přełožować: $3.
Prošu přełož ju kliknjo na slědowacy wotkaz:
$4

$5
$6

$7

Wulki dźak!
Team {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Witaj $2,

dostawaš tutu zdźělenku, dokelž sy so jako přełožowar za $3 na {{SITENAME}} zregistrował.
Nowa strona, [[$4]], steji za přełožowanje k dispoziciji. Prošu přełož ju, kliknjo na slědowacy wotkaz:

$5

$6
$7

$8

Wulki dźak!

Team {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Přełožowanska zdźělenka',
	'translationnotifications-email-priority' => 'Priorita tuteje strony je $1.',
	'translationnotifications-email-deadline' => 'Termin za přełožowanje tuteje strony je $1.',
	'logentry-translationnotifications-sent' => '$1 je zdźělenku wo přełožowanskej stronje $3; rěče: $4; termin $5; priorita $6; na {{PLURAL:$7|jednoho přijimarja|$7 přijimarjow|$7 přijimarjow|$7 prijimarjow}} wuspěšnje {{GENDER:$2|pósłał|pósłała}}, a na {{PLURAL:$8|jednoho přijimarja|$8 přijimarjow|$8 přijimarjow|$8 přijimarjow}} njewuspěšnje.',
	'log-name-notifytranslators' => 'Přełožowanske zdźělenki',
	'log-description-notifytranslators' => 'Protokol wo zdźělenkach, kotrež su so přełožowarjam wo přełožujomnych stronach pósłali',
	'translationnotifications-sent-title' => 'Přełožowanska zdźělenka je so pósłała',
	'translationnotifications-sent-body' => 'Přełožowanska zdźělenka je so pósłała.',
	'translationnotifications-log-alllanguages' => 'wšě rěče',
	'translationnotifications-nodeadline' => 'žadyn',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'translatorsignup' => 'Inscription de traductor',
	'translationnotifications-desc' => 'Permitte que traductores se inscribe pro notificationes concernente le traduction',
	'translationnotifications-info' => 'Information de usator',
	'translationnotifications-username' => 'Nomine de usator:',
	'translationnotifications-emailstatus' => 'Stato de e-mail:',
	'translationnotifications-email-confirmed' => 'Tu adresse de e-mail es confirmate',
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
	'translationnotifications-submit' => 'Inscriber',
	'notifytranslators' => 'Notificar traductores',
	'translationnotifications-send-notification-button' => 'Inviar un notification a traductores',
	'translationnotifications-deadline-label' => 'Data limite a indicar in iste notification:',
	'translationnotifications-languages-to-notify-label' => 'Le linguas a notificar (codices separate per commas):',
	'translationnotifications-priority' => 'Prioritate:',
	'translationnotifications-priority-high' => 'alte',
	'translationnotifications-priority-medium' => 'medie',
	'translationnotifications-priority-low' => 'basse',
	'translationnotifications-priority-unset' => '(non definite)',
	'translationnotifications-translatablepage-title' => 'Nomine de pagina traducibile:',
	'translationnotifications-error-no-translatable-pages' => 'Il non ha paginas traducibile in iste wiki.',
	'translationnotifications-email-subject' => 'Per favor traduce le pagina $1',
	'translationnotifications-email-body' => 'Salute $1,

Tu recipe iste message perque tu sta inscribite como traductor in $2 in {{SITENAME}}.

Il ha un nove pagina a traducer hic: $3.
Per favor traduce lo per cliccar sur le sequente ligamine:
$4

$5
$6

$7

Gratias!
Le personal de {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==

Salute $2,

Tu recipe iste notification perque tu te inscribeva como traductor de $3 in {{SITENAME}}.
Un nove pagina, [[$4]] es disponibile pro traduction. Per favor traduce lo per cliccar sur le sequente ligamine:

$5

$6
$7

$8

Gratias!

Le equipa de {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Notification de traduction',
	'translationnotifications-email-priority' => 'Le prioritate de iste pagina es $1.',
	'translationnotifications-email-deadline' => 'Le data limite pro traducer iste pagina es $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|inviava}} un notification sur le traduction del pagina $3; linguas: $4; data limite: $5; prioritate: $6; a {{PLURAL:$7|un destinatario|$7 destinatarios}} con successo, a {{PLURAL:$8|un destinatario|$8 destinatarios}} sin successo',
	'log-name-notifytranslators' => 'Notificationes de traduction',
	'log-description-notifytranslators' => 'Un registro de notificationes inviate a traductores sur paginas traducibile',
	'translationnotifications-sent-title' => 'Notification de traduction inviate',
	'translationnotifications-sent-body' => 'Le notification de traduction ha essite inviate.',
	'translationnotifications-log-alllanguages' => 'tote le linguas',
	'translationnotifications-nodeadline' => 'nulle',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'translatorsignup' => 'Aschreiwen als Iwwersetzer',
	'translationnotifications-desc' => "Erlaabt et Iwwersetzer fir sech op Iwwersetzungs-Noriichten z'abonnéieren",
	'translationnotifications-info' => 'Benotzerinformatioun',
	'translationnotifications-username' => 'Benotzernumm:',
	'translationnotifications-emailstatus' => 'E-Mail-Status:',
	'translationnotifications-email-confirmed' => 'Är E-Mailadress gouf confirméiert',
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
	'translationnotifications-cmethod-no' => 'Kontaktéiert mech net',
	'translationnotifications-frequency' => 'Heefegkeet vun de Benoriichtigungen',
	'translationnotifications-freq-always' => "Wann et eppes Neies z'iwwersetze gëtt",
	'translationnotifications-freq-week' => "Héchstens eemol d'Woch",
	'translationnotifications-freq-month' => 'Héchstens eemol de Mount',
	'translationnotifications-freq-weekly' => 'Wëchentleche Resumé',
	'translationnotifications-freq-monthly' => 'Monatleche Resumé',
	'translationnotifications-submit' => 'Schreift Iech an',
);

/** Macedonian (Македонски)
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
	'translationnotifications-submit' => 'Пријава',
	'notifytranslators' => 'Известување на преведувачите',
	'translationnotifications-send-notification-button' => 'Испрати известување до преведувачите',
	'translationnotifications-deadline-label' => 'Рок во известувањето:',
	'translationnotifications-languages-to-notify-label' => 'Кои јазици да се известат (кодови одделени со запирка):',
	'translationnotifications-priority' => 'Приоритет:',
	'translationnotifications-priority-high' => 'висок',
	'translationnotifications-priority-medium' => 'среден',
	'translationnotifications-priority-low' => 'низок',
	'translationnotifications-priority-unset' => '(незададен)',
	'translationnotifications-translatablepage-title' => 'Име на преводливата страница:',
	'translationnotifications-error-no-translatable-pages' => 'На ова вики нема преводливи страници.',
	'translationnotifications-email-subject' => 'Преведете ја пораката $1',
	'translationnotifications-email-body' => 'Здраво $1,

Писмово го примате бидејќи се пријавивте за преведувач на $2 на {{SITENAME}}.

Има нова страница што треба да се преведе: $3.
Преведете ја на следнава врска:
$4

$5
$6

$7

Ви благодариме!
Персоналот на {{SITENAME}}',
	'translationnotifications-talkpage-body' => '== $1 ==
Здраво $2,

Го добивате ова известување бидејќи се пријавивте за преведувач на {{SITENAME}} на $3.
Новата страница [[$4]] чека на преведување. Преведете ја на следнава врска:

$5

$6
$7

$8

Ви благодариме!

Персоналот на {{SITENAME}}',
	'translationnotifications-edit-summary' => 'Известување за превод',
	'translationnotifications-email-priority' => 'Приоритетот на оваа страница е $1.',
	'translationnotifications-email-deadline' => 'Крајниот рок за преведување на оваа страница е $1.',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|испрати}} известување за преведување на страницата $3; јазици: $4; краен рок: $5; приоритет: $6. Известувањето е испратено на {{PLURAL:$7|еден примач|$7 примачи}}, не успеа кај {{PLURAL:$8|еден примач|$8 примачи}} и изостави {{PLURAL:$9|еден примач|$9 примачи}}',
	'log-name-notifytranslators' => 'Известувања за преведување',
	'log-description-notifytranslators' => 'Дневник на известувањата што им се испраќаат на преведувачите со што им се соопштува кои страници се достапни за преведување',
	'translationnotifications-sent-title' => 'Известувањето за преведување е испратено',
	'translationnotifications-sent-body' => 'Известувањето за преведување е испратено.',
	'translationnotifications-log-alllanguages' => 'сите јазици',
	'translationnotifications-nodeadline' => 'без рок',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'translatorsignup' => 'Pendaftaran penterjemah',
	'translationnotifications-desc' => 'Membolehkan penterjemah untuk mendaftar diri untuk pemberitahuan penterjemahan',
	'translationnotifications-info' => 'Maklumat pengguna',
	'translationnotifications-username' => 'Nama pengguna:',
	'translationnotifications-emailstatus' => 'Status e-mel:',
	'translationnotifications-email-confirmed' => 'Alamat e-mel anda telah disahkan',
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
	'translationnotifications-submit' => 'Daftar diri',
	'notifytranslators' => 'Beritahu penterjemah',
	'translationnotifications-send-notification-button' => 'Hantar pemberitahuan kepada para penterjemah',
	'translationnotifications-deadline-label' => 'Tarikh tutup untuk dinyatakan dalam pemberitahuan ini:',
	'translationnotifications-languages-to-notify-label' => 'Bahasa-bahasa untuk diberitahukan (asingkan kod-kod dengan koma):',
	'translationnotifications-priority' => 'Prioriti:',
	'translationnotifications-priority-high' => 'tinggi',
	'translationnotifications-priority-medium' => 'sederhana',
	'translationnotifications-priority-low' => 'rendah',
	'translationnotifications-priority-unset' => '(belum ditetapkan)',
	'translationnotifications-translatablepage-title' => 'Nama laman boleh terjemah:',
	'translationnotifications-error-no-translatable-pages' => 'Tiada laman yang boleh diterjemahkan dalam wiki ini.',
	'translationnotifications-email-subject' => 'Sila terjemahkan laman $1',
	'translationnotifications-email-body' => 'Apa khabar $1,

Anda menerima e-mel ini kerana anda telah mendaftarkan diri sebagai penterjemah $2 di {{SITENAME}}.

Ada satu laman baru untuk diterjemahkan di situ: $3.
Sila terjemahkannya dengan mengklik pautan yang berikut:
$4

$5
$6

$7

Terima kasih!
Kakitangan {{SITENAME}}',
	'translationnotifications-email-priority' => 'Laman ini diberi prioriti $1.',
	'translationnotifications-email-deadline' => 'Tarikh tutup penterjemahan laman ini ialah $1.',
	'logentry-translationnotifications-sent' => '$1 berjaya {{GENDER:$2|menghantar}} satu pemberitahuan tentang penterjemahan laman $3 kepada bahasa-bahasa berikut: $4, sebelum tarikh tutup $5, dengan prioriti $6, kepada {{PLURAL:$7|seorang penerima|$7 orang penerima}}, tetapi gagal berbuat demikian kepada {{PLURAL:$8|seorang lagi|$8 orang lagi}}',
	'log-name-notifytranslators' => 'Pemberitahuan penterjemahan',
	'translationnotifications-sent-title' => 'Pemberitahuan penterjemahan dihantar',
	'translationnotifications-sent-body' => 'Pemberitahuan penterjemahan telah dihantar.',
);

/** Dutch (Nederlands)
 * @author AvatarTeam
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'translatorsignup' => 'Vertalersregistratie',
	'translationnotifications-desc' => 'Laat vertalers intekenen voor berichten over vertalingen',
	'translationnotifications-info' => 'Gebruikersgegevens',
	'translationnotifications-username' => 'Gebruikersnaam:',
	'translationnotifications-emailstatus' => 'E-mailadresstatus:',
	'translationnotifications-email-confirmed' => 'Uw e-mailadres is bevestigd',
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
	'translationnotifications-submit' => 'Registreren',
	'notifytranslators' => 'Meldingen voor vertalers',
	'translationnotifications-send-notification-button' => 'Stuur een bericht naar vertalers',
	'translationnotifications-deadline-label' => 'Deadline voor deze melding:',
	'translationnotifications-languages-to-notify-label' => 'Voor welke talen moet een melding gemaakt worden (komma gescheiden taalcodes):',
	'translationnotifications-priority' => 'Prioriteit:',
	'translationnotifications-priority-high' => 'hoog',
	'translationnotifications-priority-medium' => 'gemiddeld',
	'translationnotifications-priority-low' => 'laag',
	'translationnotifications-priority-unset' => '(niet ingesteld)',
	'translationnotifications-translatablepage-title' => 'Naam vertaalbare pagina:',
	'translationnotifications-error-no-translatable-pages' => "Er zijn geen vertaalbare pagina's in deze wiki.",
	'translationnotifications-email-subject' => 'Vertaal alstublieft de pagina $1',
	'translationnotifications-email-body' => 'Hallo $1,

U ontvangt deze e-mail omdat u zich heeft opgegeven als vertaler voor het $2 op {{SITENAME}}.

Er is een nieuwe pagina te vertalen: $3.
Vertaal deze alstublieft door op de volgende verwijzing te klikken:
$4

$5
$6

$7

Bedankt!
{{SITENAME}}-beheerders',
	'translationnotifications-talkpage-body' => '== $1 ==

Hallo $2,

U ontvangt deze melding omdat u zich heeft opgegeven als vertaler voor het $3 op {{SITENAME}}.
De pagina [[$4]] is beschikbaar voor vertaling. Vertaal deze alstublieft door op de volgende verwijzing te klikken:

$5

$6
$7

$8

Bedankt!

{{SITENAME}}-beheerders',
	'translationnotifications-email-priority' => 'De prioriteit voor deze pagina is $1.',
	'translationnotifications-email-deadline' => 'De deadline voor het vertalen van deze pagina is  $1.',
	'log-description-notifytranslators' => "Een logboek van meldingen verzonden naar vertalers over vertaalbare pagina's",
	'translationnotifications-log-alllanguages' => 'alle talen',
	'translationnotifications-nodeadline' => 'geen',
);

/** Polish (Polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'translatorsignup' => 'Rejestracja tłumacza',
	'translationnotifications-desc' => 'Umożliwia zarejestrować tłumacza by otrzymywać powiadomienia tłumaczeń',
	'translationnotifications-info' => 'Informacje o użytkowniku',
	'translationnotifications-username' => 'Nazwa użytkownika:',
	'translationnotifications-emailstatus' => 'Stan e-mail:',
	'translationnotifications-email-confirmed' => 'Twój adres e-mail jest potwierdzony',
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
	'translationnotifications-submit' => 'Zarejestruj się',
	'notifytranslators' => 'Powiadom tłumaczy',
	'translationnotifications-send-notification-button' => 'Wyślij powiadomienia do tłumaczy',
	'translationnotifications-deadline-label' => 'Termin do wskazania w tym powiadomieniu:',
	'translationnotifications-languages-to-notify-label' => 'Jakie języki powiadomić (kody rozdzielone przecinkami):',
	'translationnotifications-priority' => 'Priorytet:',
	'translationnotifications-priority-high' => 'wysoki',
	'translationnotifications-priority-medium' => 'średni',
	'translationnotifications-priority-low' => 'niski',
	'translationnotifications-priority-unset' => '(nieustawiony)',
	'translationnotifications-translatablepage-title' => 'Nazwa strony do przetłumaczenia:',
	'translationnotifications-error-no-translatable-pages' => 'Nie ma stron do przetłumaczenia na tej wiki.',
	'translationnotifications-email-subject' => 'Przetłumacz stronę $1',
	'translationnotifications-email-body' => 'Witaj  $1,

Otrzymujesz tę wiadomość e-mail, ponieważ użytkownik zarejestrował się jako tłumacz na  $2  portalu {{SITENAME}}.

Jest nowa strona do tłumaczenia:  $3 .
Przetłumacz ją klikając poniższe łącze:
$4

$5
$6

$7

Dziękujemy!
Zespół {{SITENAME}}',
	'translationnotifications-email-priority' => 'Priorytet tej strony to  $1 .',
	'translationnotifications-email-deadline' => 'Nieprzekraczalny termin tłumaczenia tej strony to $1 .',
	'logentry-translationnotifications-sent' => '$1 {{GENDER:$2|wysyłał|wysłała}} powiadomienie w sprawie tłumaczenia strony $3; języki: $4; termin $5; priorytet $6; do {{PLURAL:$7|jednego adresata|$7 adresatów}} pomyślnie, do {{PLURAL:$8|jednego adresata|$8 adresatów}} bezskutecznie',
	'log-name-notifytranslators' => 'Powiadomienia o tłumaczeniach',
	'translationnotifications-sent-title' => 'Wysłano powiadomienie tłumaczenia',
	'translationnotifications-sent-body' => 'Powiadomienie o tłumaczeniu zostało wysłane.',
);

/** Swedish (Svenska)
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
	'translationnotifications-cmethod-no' => 'Kontakta inte mig',
	'translationnotifications-frequency' => 'Kontaktfrekvens',
	'translationnotifications-freq-always' => 'När det finns någonting nytt att översätta',
	'translationnotifications-freq-week' => 'Högst en gång i veckan',
	'translationnotifications-freq-month' => 'Högst en gång i månaden',
	'translationnotifications-freq-weekly' => 'Sammandrag varje vecka',
	'translationnotifications-freq-monthly' => 'Sammandrag varje månad',
	'translationnotifications-submit' => 'Registrera',
	'notifytranslators' => 'Meddela översättare',
	'translationnotifications-send-notification-button' => 'Skicka ett meddelande till översättare',
	'translationnotifications-deadline-label' => 'Tidsgränsen att ange i denna anmälan:',
	'translationnotifications-languages-to-notify-label' => 'Vilka språk som ska meddelas (kod):',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 */
$messages['ta'] = array(
	'translationnotifications-info' => 'பயனர் தகவல்',
	'translationnotifications-username' => 'பயனர் பெயர்:',
	'translationnotifications-languages' => 'மொழிகள்',
	'translationnotifications-lang' => 'மொழி  #$1',
	'translationnotifications-nolang' => 'மொழியைத் தேர்ந்தெடுக்கவும்',
	'translationnotifications-cmethod-email' => 'மின்னஞ்சல்',
	'translationnotifications-cmethod-talkpage' => 'உரையாடல் பக்கம்',
	'translationnotifications-submit' => 'பதிவுசெய்',
);

