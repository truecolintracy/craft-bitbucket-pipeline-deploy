<?php
/**
 * Bitbucket Pipeline Deployment plugin for Craft CMS 3.x
 *
 * Uses the Bitbucket API to run pipelines and deploy to any number of services
 *
 * @link      https://www.colintracy.com
 * @copyright Copyright (c) 2020 Colin Tracy
 */

namespace aisleng\bitbucketpipelinedeployment\models;

use aisleng\bitbucketpipelinedeployment\BitbucketPipelineDeployment;

use Craft;
use craft\base\Model;

/**
 * BitbucketPipelineDeployment Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Colin Tracy
 * @package   BitbucketPipelineDeployment
 * @since     0.1.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $bitbucketUser = '';
    public $bitbucketPassword = '';
    public $buildHooks = [[
        'siteName' => '',
        'branch' => '',
        'workspaceSlug' => 'progressmanufacturing',
        'repoSlug' => ''
    ]];

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['bitbucketUser', 'bitbucketPassword'] , 'required'],
            ['bitbucketUser', 'default', 'value' => ''],
            ['bitbucketPassword', 'default', 'value' => ''],
            ['buildHooks', 'default', 'value' => [[
                'siteName' => '',
                'branch' => '',
                'workspaceSlug' => 'progressmanufacturing',
                'repoSlug' => ''
            ]]],
        ];
    }
}
