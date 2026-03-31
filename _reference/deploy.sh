#!/bin/bash

# Grow with DXN Deployment Script
# Usage: ./deploy.sh [environment]

ENVIRONMENT=${1:-production}
echo "🚀 Deploying Grow with DXN to $ENVIRONMENT"

# Check if .env exists
if [ ! -f .env ]; then
    echo "❌ .env file not found. Copy .env.example and configure it first."
    exit 1
fi

# Install dependencies
echo "📦 Installing dependencies..."
npm run install:all

# Build the application
echo "🔨 Building application..."
npm run build

# Check if build was successful
if [ ! -d "server/public" ]; then
    echo "❌ Build failed - server/public directory not found"
    exit 1
fi

# Set environment
export NODE_ENV=$ENVIRONMENT

# Start the application
if [ "$ENVIRONMENT" = "production" ]; then
    echo "🌐 Starting production server..."
    npm start
else
    echo "🛠️  Starting development server..."
    npm run dev
fi

echo "✅ Deployment complete! App running on port 5000"