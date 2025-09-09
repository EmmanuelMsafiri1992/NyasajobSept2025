<?php
// email_template.php

function getEmailContent($firstName, $userJobs) {
    $jobsList = '';
    foreach ($userJobs as $job) {
        // Construct the link dynamically using the job title or slug
        $slug = generateSlug($job['title'], $job['id']);
        $link = 'https://nyasajob.com/' . $slug;

        $jobsList .= "<li><a href='{$link}'>{$job['title']}</a> posted on {$job['created_at']}</li>";
    }

    return "
    <html>
    <head>
      <title>New Job Notifications</title>
    </head>
    <body>
      <p>Dear {$firstName},</p>
      <p>We have new job notifications for you!</p>
      <ul>
        {$jobsList}
      </ul>
      <p>Best regards,<br>Nyasajob Career International</p>
      <p>If you wish to unsubscribe from these notifications, please <a href='https://nyasajob.com/unsubscribe.php?email={$firstName}'>click here</a>.</p>
    </body>
    </html>
    ";
}

function generateSlug($title, $id) {
    // Generate slug based on the title and id, similar to your URL structure
    // For example: environmental-compliance-officer-Opnel5EgaKB
    // Assuming the unique identifier after the title is stored in your database or generated

    // For now, let's create a placeholder function
    $slugifiedTitle = str_replace(' ', '-', strtolower($title));
    $uniqueId = base64_encode($id); // Example unique identifier, adjust as needed
    return $slugifiedTitle . '-' . $uniqueId;
}
?>
