#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

echo "🚀 Starting Production Deployment..."

# 1. Pull the latest code from GitHub
echo "📥 Pulling latest code from Git..."
git pull origin main

# 2. Build the new Docker images (without using cache to ensure fresh code)
echo "🏗️ Building new Docker image..."
docker-compose build --no-cache

# 3. Restart the containers with the new image
# The -d flag runs them in the background
echo "🔄 Restarting containers..."
docker-compose up -d

# 4. Clean up old unused Docker images to save disk space
echo "🧹 Cleaning up old unused images..."
docker image prune -f

echo "✅ Deployment Successful! Your app is now live."
