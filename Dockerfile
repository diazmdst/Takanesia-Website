# STAGE 1: Build
FROM node:18-alpine AS builder
WORKDIR /app
COPY . .
RUN if [ -f package.json ]; then \
    npm install --quiet && npm run build --quiet || echo "LOG: Build failed"; \
    fi

# STAGE 2: Production (Secure non-root setup)
FROM nginx:stable-alpine

# Set up a non-root execution environment
# We use the existing 'nginx' user and move the port to 8080
WORKDIR /usr/share/nginx/html

# Update Nginx config to run on 8080 (non-privileged port)
RUN sed -i 's/listen\(.*\)80;/listen 8080;/g' /etc/nginx/conf.d/default.conf && \
    sed -i '/user  nginx;/d' /etc/nginx/nginx.conf && \
    touch /var/run/nginx.pid && \
    chown -R nginx:nginx /usr/share/nginx/html /var/cache/nginx /var/log/nginx /etc/nginx/conf.d /var/run/nginx.pid

# Clean and copy assets with proper ownership
COPY --from=builder --chown=nginx:nginx /app /app
RUN rm -rf ./* && \
    if [ -d /app/dist ]; then cp -a /app/dist/. ./; \
    else cp -a /app/src/. ./; fi && \
    rm -rf /app

# Switch to non-root user
USER nginx

# Security: Healthcheck on the new port
HEALTHCHECK --interval=30s --timeout=3s CMD wget --quiet --tries=1 --spider http://localhost:8080/ || exit 1

EXPOSE 8080
CMD ["nginx", "-g", "daemon off;"]
