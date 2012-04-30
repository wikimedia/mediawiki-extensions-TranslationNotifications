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
	'translationnotifications-submit-ok' => 'Notifications have been added to a queue and are delivered by a background job.'
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
A new page, [[$4]] is available for translation. Please [$5 translate it].

$6
$7

$8

Thank you!

{{SITENAME}} staff',
	'translationnotifications-digestemail-subject' => 'Digest e-mail for translation requests from {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hello $1,

You are receiving this e-mail because you signed up as a translator to $2 on {{SITENAME}}.

There {{PLURAL:$3|is 1 page|are $3 pages}} available for translation. The details are given below.

$4

To change your notification preferences for translation requests, please visit $5

Thank you!
{{SITENAME}} staff',
	'translationnotifications-digestemail-notification-line' => 'On $1, $2 marked "$3" for translation. You can translate it at $4',
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
	'translationnotifications-digestemail-body' => '
* $1 - username
* $2 - first language preference of user
* $3 - number of pages available for translation.
* $4 - The list of notifications, this is the main part of the email.
* $5 - Link to [[Special:NotifyTranslators]]',
	'translationnotifications-digestemail-notification-line' => 'The message line for notification in the digest.
* $1 - date
* $2 - user name
* $3 - translatable page title
* $4 - link to [[Special:Translate]] page for the users first language.',
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
* $8 - number of recipients to whom sending the notification failed
* $9 - number of recipients to whom the notification was not sent because it was too early to send it according to their preferences.',
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
Eine neue Seite, [[$4]], ist zum Übersetzen vorhanden. [$5 Übersetze sie bitte].

$6
$7

$8

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-digestemail-subject' => 'E-Mail-Übersicht zu Übersetzungsanforderungen von {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hallo $1,

du erhältst diese E-Mail, da du dich als Übersetzer(in) für $2 auf {{SITENAME}} registriert hast.
Es {{PLURAL:$3|ist eine Seite|sind $3 Seiten}} zum Übersetzen vorhanden. Einzelheiten sind unten angegeben:

$4

Um deine Einstellungen zu Übersetzungsbenachrichtigungen zu ändern, kannst du $5 besuchen.

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-digestemail-notification-line' => 'Am $1 gab $2 die Seite „$3“ zur Übersetzung frei. Du kannst sie unter $4 übersetzen.',
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
Eine neue Seite, [[$4]], ist zum Übersetzen vorhanden. [$5 Übersetzen Sie sie bitte].

$6
$7

$8

Vielen Dank,
die Mitarbeiter von {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hallo $1,

Sie erhalten diese E-Mail, da Sie sich als Übersetzer(in) für $2 auf {{SITENAME}} registriert haben.
Es {{PLURAL:$3|ist eine Seite|sind $3 Seiten}} zum Übersetzen vorhanden. Einzelheiten sind unten angegeben:

$4

Um Ihre Einstellungen zu Übersetzungsbenachrichtigungen zu ändern, können Sie $5 besuchen.

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
	'translationnotifications-digestemail-subject' => 'E-mailowy pśeglěd za póžedane pśełožki wót {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'translationnotifications-digestemail-notification-line' => 'Dnja $1 jo $2 bok "$3" za pśełožowanje markěrował. Móžoš ju na $4 pśełožowaś.',
	'translationnotifications-edit-summary' => 'Pśełožowańska powěźeńka',
	'translationnotifications-email-priority' => 'Priorita toś togo boka jo $1.',
	'translationnotifications-email-deadline' => 'Termin za pśełožowanje toś togo boka jo $1.',
	'logentry-translationnotifications-sent' => '$1 jo powěźeńku wó pśełožowańskem boku $3 {{GENDER:$2|pósłał|posłała}}; rěcy: $4; termin $5; priorita $6; jo ju na {{PLURAL:$7|jadnogo dostawarja|$7 dostawarjowu|$7 dostawarjow|$7 dostawarjow}} {{GENDER:$2|pósłał|pósłała}}, jo se njeraźiła za {{PLURAL:$8|jadnogo dostawarja|$8 dostawarjowu$8 dostawarjow|$8 dostawarjow}}, jo se pśeskócyła za  {{PLURAL:$9|jadnogo dostawarja|$9 dostawarjowu|$9 dostawarjow|$9 dostawarjow}}.',
	'log-name-notifytranslators' => 'Pśełožowańske powěźeńki',
	'log-description-notifytranslators' => 'Protokol wó powěžeńkach, kótarež su se pśełožowarjam wó pśełožujobnych bokach pósłali',
	'translationnotifications-sent-title' => 'Pśełožowańska powěźeńka jo se pósłała',
	'translationnotifications-sent-body' => 'Pśełožowańska powěźeńka jo se pósłała.',
	'translationnotifications-log-alllanguages' => 'wšykne rěcy',
	'translationnotifications-nodeadline' => 'žeden',
);

/** Spanish (Español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'translatorsignup' => 'Inscripción de traductores',
	'translatorsignup-summary' => 'Utiliza esta página para indicar a qué idiomas puedes traducir, y cómo deseas ser contactado sobre las nuevas solicitudes de traducción.',
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

Una nueva página, [[$4]] está disponible para su traducción. Por favor  [$5 tradúzcala].

$6
$7

$8

¡Gracias!

El equipo de {{SITENAME}}',
	'translationnotifications-digestemail-subject' => 'Correo electrónico de resumen para solicitudes de traducción de {{SITENAME}}',
	'translationnotifications-digestemail-body' => 'Hola  $1,

Está recibiendo este mensaje porque se inscribió como traductor  de {{SITENAME}} al  $2.

Hay  {{PLURAL:$3|1 página|$3  páginas}} disponibles para su traducción. A continuación figuran los detalles.

$4

Para cambiar sus preferencias de notificación para las solicitudes de traducción, por favor visite $5 

¡Gracias!
El equipo de {{SITENAME}}',
	'translationnotifications-digestemail-notification-line' => 'En $1,  $2  ha marcado "$3" para su traducción. Puede traducirlo en $4',
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

