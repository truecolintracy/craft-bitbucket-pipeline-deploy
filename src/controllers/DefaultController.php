<?php
/**
 * Bitbucket Pipeline Deployment plugin for Craft CMS 3.x
 *
 * Uses the Bitbucket API to run pipelines and deploy to any number of services
 *
 * @link      https://www.colintracy.com
 * @copyright Copyright (c) 2020 Colin Tracy
 */

namespace aisleng\bitbucketpipelinedeployment\controllers;

use aisleng\bitbucketpipelinedeployment\BitbucketPipelineDeployment;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Colin Tracy
 * @package   BitbucketPipelineDeployment
 * @since     0.1.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/bitbucket-pipeline-deployment/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $ch = curl_init();
        $bitbucketUserName = Craft::$app->plugins->getPlugin('bitbucket-pipeline-deployment')->getSettings()->bitbucketUser;
        $bitbucketPassword = Craft::$app->plugins->getPlugin('bitbucket-pipeline-deployment')->getSettings()->bitbucketPassword;
        $repo = CRAFT::$app->request->get('repo');
        $workspace = CRAFT::$app->request->get('workspace');
        $branch = CRAFT::$app->request->get('branch');
        
        $data = array('target' => array(
            'ref_type' => 'branch',
            'type' => 'pipeline_ref_target',
            'ref_name' => $branch
        ));

        curl_setopt($ch, CURLOPT_URL, 'https://api.bitbucket.org/2.0/repositories/' . $workspace . '/' . $repo . '/pipelines/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "\n  {\n    \"target\": {\n      \"ref_type\": \"branch\", \n      \"type\": \"pipeline_ref_target\", \n      \"ref_name\": \"" . $branch . "\" \n    }\n  }");
        curl_setopt($ch, CURLOPT_USERPWD, $bitbucketUserName . ':' . $bitbucketPassword);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
}
