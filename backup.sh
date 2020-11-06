#!/bin/sh

# Directory to back up
SOURCE_DIR=/var/www/html

# Target
TARGET_DIR=/home/ec2-user/
TARGET_BUCKET=mjchen-ningxia/backup/

# Output files
NOW=$(date +"%Y_%m_%d_%H_%M_%S")
FILES_OUTPUT=$TARGET_DIR/files.$NOW.zip

# Back up files
zip -r $FILES_OUTPUT $SOURCE_DIR

# Upload to S3
aws s3 cp $FILES_OUTPUT s3://$TARGET_BUCKET