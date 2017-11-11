<?php
class Mail {


	/**
	 * @param $args [subject, content, mailTo, plainTextContent]
	 *
	 * @return int
	 */
	public static function sendMail($args) {
		/** @var $SM SwiftMailer */
		$mail = Yii::app()->params['mail'];
		$SM = Yii::app()->swiftMailer;
		$Transport = $SM->smtpTransport($mail['host'], $mail['port'])
		                ->setUsername($mail['username'])
		                ->setPassword($mail['password']);

		// Mailer
		$Mailer = $SM->mailer($Transport);
		$subject = $content = $mailTo = $plainTextContent = '';

		if ( isset($args['subject']) ) {
			$subject = $args['subject'];
		}

		if ( isset($args['content']) ) {
			$content = $args['content'];
		}

		if ( isset($args['mailTo']) ) {
			$mailTo = $args['mailTo'];
		}

		if ( isset($args['plainTextContent']) ) {
			$plainTextContent = $args['plainTextContent'];
		}

		$Message = $SM
			->newMessage($subject)
			->setFrom( array($mail['username']) )
			->setTo( array($mailTo))
			->addPart($content, 'text/html')
			->setBody($plainTextContent);

		// Send mail
		$result = $Mailer->send($Message);
		return $result;
	}
}