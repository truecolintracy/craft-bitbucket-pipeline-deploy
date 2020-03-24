<?php
/**
 * Bitbucket Pipeline Deployment plugin for Craft CMS 3.x
 *
 * Uses the Bitbucket API to run pipelines and deploy to any number of services
 *
 * @link      https://www.colintracy.com
 * @copyright Copyright (c) 2020 Colin Tracy
 */

namespace aisleng\bitbucketpipelinedeployment\variables;

use aisleng\bitbucketpipelinedeployment\BitbucketPipelineDeployment;

use Craft;

/**
 * Bitbucket Pipeline Deployment Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.bitbucketPipelineDeployment }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Colin Tracy
 * @package   BitbucketPipelineDeployment
 * @since     0.1.0
 */
class BitbucketPipelineDeploymentVariable
{
    // Public Methods
    // =========================================================================
    
    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.bitbucketPipelineDeployment.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.bitbucketPipelineDeployment.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function buildHooks($optional = null)
    {
        return Craft::$app->plugins->getPlugin('bitbucket-pipeline-deployment')->getSettings()->buildHooks;
    }
}
