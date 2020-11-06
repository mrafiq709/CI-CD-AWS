IAM Role:
--------
Create the following IAM roles and attach the policies
- IAM role for Instance profile
    - CodeDeployInstanceRole: Attache the following policies
        - AmazonEC2RoleforAWSCodeDeploy
            -> This allows EC2 instance under CodeDeploy to access S3
        - AutoScalingNotificationAccessRole
            -> This allows EC2 instance under CodeDeploy to access SNS and SQS
- IAM role for Service profile
    - CodeDeployServiceRole: Attach following policies
        - AWSCodeDeployRole
            -> This allows the CodeDeploy service to access autoscale/ec2/SNS
    - > Note: Edit Trust Relationship to ensure ->
      > "Service": "codedeploy.amazonaws.com"


Configure an Amazon EC2 Instance to Work with AWS CodeDeploy:
-------------------------------------------------------------------
- Create EC2 Instance and in Step 3: Configure Instance Details
    - assign CodeDeployInstanceRole in IAM role section
    
- Connect EC2 throw ssh and Run bellow command in command line
    ```
    sudo apt-get update OR sudo yum update
    sudo apt-get install ruby
    cd /home/ubuntu
    wget https://aws-codedeploy-us-east-2.s3.us-east-2.amazonaws.com/latest/install
    chmod +x ./install
    sudo ./install auto [ for Ubuntu 14.04, 16.04, and 18.04 ]
    sudo ./install auto > /tmp/logfile [ for Ubuntu 20.04 ]
    sudo service codedeploy-agent status
    sudo service codedeploy-agent start
    
    ```
CodeDeploy Set Up:
-------------------
Go to AWS console -> CodeDeploy 
https://console.aws.amazon.com/codesuite/codedeploy/applications?region=us-east-1

- Select application from side menu and create a application
- Go to the application which is created right now
    - Create Deployment Group
        - assign CodeDeployServiceRole
 
 Pipeline Set Up:
 ------------------
 - Select Pipeline from side menu and Create pipeline
    - step-1: Give name of pipeline
    - step-2: For source: Select GitHub (Version 2)
        - Connect your GitHub account and select repository and branch
    - step-3: skip
    - step-4: Deploy provider: AWSCodeDeploy
        - Select Region
        - Select Application name
        - Select Deployment group
    - step-5: Create pipeline
    
appspec.yml:
-----------------
Create a file name appspec.yml in root directory of your project
```
version: 0.0
os: linux
```

> Not need Here, If needed we can copy files to server with bellow command
>
> ```
> files:
>
>    - source: /index.html
>
>      desitnation: /var/www/mysite/
> ```

```
hooks:
  AfterInstall:
    - location: scripts/AfterInstall
      timeout: 300
      runas: root
```
scripts/AfterInstall:
----------------------
Create a File AfterInstall

```
#!/bin/bash
if [ "$DEPLOYMENT_GROUP_NAME" == "development" ]
then
	cd /var/www/mysite/my_profile && \
    git clean -df && \
    git fetch && \
    git checkout development && \
    git reset --hard origin/development && \
    chmod +x build.sh && \
    ./build.sh
```
> Optional:
>
> ```
> elif [ "$DEPLOYMENT_GROUP_NAME" == "staging" ]
> then
>	  cd /var/www/mysite/staging-site/ && \
>     git clean -df && \
>     git fetch && \
>     git checkout staging && \
>     git reset --hard origin/staging && \
>     cd /var/www/mysite/staging-site/public/api-doc && \
>     apidoc -i input/ -o output/ && \
>     cd /var/www/mysite/staging-site && \
>     chmod +x build.sh && \
>     ./build.sh
> ```
```
fi
```
build.sh:
------------
Create a file build.sh
```

#!/bin/bash
#Auto run after deploy source code
composer install && \
composer dumpautoload && \
sudo chmod -R 777 storage bootstrap/cache
php artisan migrate --force && \
php artisan cache:clear && \
php artisan config:clear && \
php artisan route:clear && \
php artisan view:clear

```

> Before deploy in server for the first time
> run composer update locally
> remove vendor/ folder for gitingonre and upload it
> upload composer.lock
> Because in server there is not enough memory to run `composer update`, `composer install` will read all deopendency from composer.lock

##### Reference
https://www.youtube.com/watch?v=K8J6ngMekx4&ab_channel=CLOUDGURU

https://docs.aws.amazon.com/codedeploy/latest/userguide/codedeploy-agent-operations-install-ubuntu.html

https://linuxbeast.com/tutorials/aws/how-to-install-php-on-ubuntu-server/
