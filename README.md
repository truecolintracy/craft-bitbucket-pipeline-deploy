# Bitbucket Pipeline Deployment plugin for Craft CMS 3.x

Uses the Bitbucket API to run pipelines and deploy to any number of services

![Screenshot](resources/img/bb-deploy.svg)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require aisleng/bitbucket-pipeline-deployment

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Bitbucket Pipeline Deployment.

## Using Bitbucket Pipeline Deployment

Install the plugin through composer or the craft plugin store. 

Once installed you should see the setting area.  Here you should enter the user that will run the pipelines username and password for bitbucket.

Then you can enter the following:

* Repository or Site Name
* Branch Name
* Workspace Slug
* Repository Slug

Users should now have access to deploy to your bitbucket pipelines once the content is ready.

## Bitbucket Pipeline Deployment Roadmap

Some things to do, and ideas for potential features:

* Connect directly to bitbucket and pull repos
* User dropdown for selecting repos
* Notify user when pipeline is finished with toast

Brought to you by [Colin Tracy](https://www.colintracy.com)
