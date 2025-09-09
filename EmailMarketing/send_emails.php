<?php
// send_emails.php

require 'fetch_new_jobs.php';  // Fetch new jobs from the database
require 'fetch_emails.php';    // Fetch user emails
require 'email_template.php';
require 'mailer_config.php';

if (empty($newJobs)) {
    // No new jobs to send
    echo "No new jobs found.\n";
    exit;
}

$mail = getMailer();

foreach ($users as $user) {
    // Filter new jobs to match the user's country code
    $userCountryCode = $user['country_code'];

    // Filter jobs matching the user's country code
    $userJobs = array_filter($newJobs, function($job) use ($userCountryCode) {
        return $job['country_code'] === $userCountryCode;
    });

    if (empty($userJobs)) {
        // No new jobs for this user; you can choose to skip or send a notification about no new jobs
        continue;
    }

    try {
        // Clear previous recipient and attachments
        $mail->clearAddresses();
        $mail->clearAttachments();

        // Recipient
        $mail->addAddress($user['email'], $user['name']);

        // Email content
        $emailContent = getEmailContent($user['name'], $userJobs);
        $mail->Body    = $emailContent;
        $mail->AltBody = strip_tags($emailContent); // Plain text version

        // Send email
        $mail->send();
        echo "Email sent to: {$user['email']}\n";
    } catch (Exception $e) {
        echo "Failed to send email to {$user['email']}. Error: {$mail->ErrorInfo}\n";
    }
}
?>
