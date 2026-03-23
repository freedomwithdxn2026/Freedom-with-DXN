# Build stage
FROM node:18-alpine AS builder

WORKDIR /app

# Copy package files
COPY package*.json ./
COPY client/package*.json ./client/
COPY server/package*.json ./server/

# Install dependencies
RUN npm run install:all

# Copy source code
COPY . .

# Build the client
RUN npm run build

# Production stage
FROM node:18-alpine AS production

WORKDIR /app

# Copy server package files
COPY server/package*.json ./server/

# Install only production dependencies for server
RUN cd server && npm ci --only=production

# Copy built client and server code
COPY --from=builder /app/server ./server
COPY --from=builder /app/client/dist ./server/public

# Create non-root user
RUN addgroup -g 1001 -S nodejs
RUN adduser -S nextjs -u 1001

# Change ownership
RUN chown -R nextjs:nodejs /app
USER nextjs

# Expose port
EXPOSE 5000

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
  CMD curl -f http://localhost:5000/api/health || exit 1

# Start the server
CMD ["npm", "start", "--prefix", "server"]