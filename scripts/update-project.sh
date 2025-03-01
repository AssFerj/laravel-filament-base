#!/bin/bash

# Correctly export the PASSWORD variable
export PASSWORD="$1"

# Check if sshpass is installed
if ! command -v sshpass &> /dev/null; then
    echo "sshpass could not be found. Please install sshpass."
    exit 1
fi

# Use sshpass to execute the SSH command with inline commands
sshpass -p "$PASSWORD" ssh -o StrictHostKeyChecking=no lsmenezesstxlaravelcms@ls1.lsmenezes.com.br << 'EOF'
    echo "Connected to remote server."
    cd web || { echo "Directory 'web' not found"; exit 1; }
    git pull -v
EOF