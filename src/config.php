<?php
/**
 * Bitbucket Pipeline Deployment plugin for Craft CMS 3.x
 *
 * Uses the Bitbucket API to run pipelines and deploy to any number of services
 *
 * @link      https://www.colintracy.com
 * @copyright Copyright (c) 2020 Colin Tracy
 */

/**
 * Bitbucket Pipeline Deployment config.php
 *
 * This file exists only as a template for the Bitbucket Pipeline Deployment settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'bitbucket-pipeline-deployment.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    "buildHooks" => [[
        'siteName' => '',
        'branch' => '',
        'workspaceSlug' => '',
        'repoSlug' => ''
    ]]
];
