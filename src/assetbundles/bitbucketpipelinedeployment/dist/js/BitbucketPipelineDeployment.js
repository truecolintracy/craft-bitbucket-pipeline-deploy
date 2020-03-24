/**
 * Bitbucket Pipeline Deployment plugin for Craft CMS
 *
 * Bitbucket Pipeline Deployment JS
 *
 * @author    Colin Tracy
 * @copyright Copyright (c) 2020 Colin Tracy
 * @link      https://www.colintracy.com
 * @package   BitbucketPipelineDeployment
 * @since     0.1.0
 */

const deployButtons = document.getElementsByClassName("deploy-btn");
let repo, workspace, branch;

for (let i = 0; i < deployButtons.length; i++) {
  deployButtons.item(i).addEventListener("click", function() {
    repo = deployButtons.item(i).dataset.repo;
    branch = deployButtons.item(i).dataset.branch;
    workspace = deployButtons.item(i).dataset.workspace;
    
    Craft.postActionRequest(
      `bitbucket-pipeline-deployment&repo=${repo}&workspace=${workspace}&branch=${branch}`,
      function(response) {
        console.log(response)
      }
    );
  })
}