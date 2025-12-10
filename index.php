<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraceKit Widget Test</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            background: #f3f4f6;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        h1 {
            color: #111827;
            margin-bottom: 10px;
        }
        p {
            color: #6b7280;
            margin-bottom: 30px;
        }
        .widget-wrapper {
            border: 2px dashed #e5e7eb;
            padding: 20px;
            border-radius: 8px;
            background: #f9fafb;
        }
        .info {
            margin-top: 30px;
            padding: 20px;
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            border-radius: 4px;
        }
        .info h3 {
            margin: 0 0 10px 0;
            color: #1e40af;
        }
        .info p {
            margin: 5px 0;
            color: #1e40af;
            font-size: 14px;
        }
        code {
            background: #f3f4f6;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 13px;
            color: #dc2626;
        }

        /* Custom Widget Styles - Override TraceKit defaults */

        /* Make first badge widget purple gradient */
        #tracekit-badge-cvefdf1ev.tracekit-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            border: none !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-badge-service-name {
            color: white !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-metric-label {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-metric-value {
            color: white !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-trend-label {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-badge-footer {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        #tracekit-badge-cvefdf1ev .tracekit-badge-footer a {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Make metrics dashboard have rounded corners and shadow */
        #tracekit-metrics-zgo7fmu49.tracekit-metrics-dashboard {
            border-radius: 20px !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15) !important;
            border: 2px solid #8b5cf6 !important;
        }

        /* Custom alert colors */
        #tracekit-alerts-71u4ygugi .tracekit-alert-count-card {
            border-radius: 15px !important;
        }

        /* Make overview services have hover effect */
        #tracekit-overview-nn9iogjw0 .tracekit-service-item {
            transition: all 0.3s ease !important;
        }

        #tracekit-overview-nn9iogjw0 .tracekit-service-item:hover {
            transform: translateX(5px) !important;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3) !important;
            border-color: #8b5cf6 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎯 TraceKit Widget Test</h1>
        <p>Testing embeddable widget from a PHP application</p>

        <!-- Load TraceKit SDK once -->
        <script src="http://localhost:8081/static/js/tracekit-widgets.js"></script>
        <script src="http://localhost:8081/static/js/tracekit-widgets-ui.js"></script>

        <div class="widget-wrapper">
            <h2 style="margin-top: 0; font-size: 16px; color: #6b7280;">Widget 1: Service Badge (Custom Styled + Dark Theme)</h2>

            <!-- TraceKit Widget -->
            <div id="tracekit-badge-cvefdf1ev"></div>
            <script>
              TraceKit.badge({
                apiKey: 'your-widget-api-key-here', // Get from https://app.tracekit.dev
                serviceName: 'api-gateway',
                container: '#tracekit-badge-cvefdf1ev',
                theme: 'dark'  // Use dark theme for better contrast with gradient
              });
            </script>
        </div>

        <div class="widget-wrapper" style="margin-top: 30px;">
            <h2 style="margin-top: 0; font-size: 16px; color: #6b7280;">Widget 2: Full Metrics Dashboard</h2>

            <!-- TraceKit Widget -->
            <div id="tracekit-metrics-zgo7fmu49"></div>
            <script>
              TraceKit.metrics({
                apiKey: 'your-widget-api-key-here', // Get from https://app.tracekit.dev
                serviceName: 'api-gateway',
                container: '#tracekit-metrics-zgo7fmu49',
                timeRange: '24h'
              });
            </script>
        </div>

        <div class="widget-wrapper" style="margin-top: 30px;">
            <h2 style="margin-top: 0; font-size: 16px; color: #6b7280;">Widget 3: Alerts Summary</h2>

            <!-- TraceKit Widget -->
            <div id="tracekit-alerts-71u4ygugi"></div>
            <script>
              TraceKit.alerts({
                apiKey: 'your-widget-api-key-here', // Get from https://app.tracekit.dev
                container: '#tracekit-alerts-71u4ygugi'
              });
            </script>
        </div>

        <div class="widget-wrapper" style="margin-top: 30px;">
            <h2 style="margin-top: 0; font-size: 16px; color: #6b7280;">Widget 4: Multi-Service Overview</h2>

            <!-- TraceKit Widget -->
            <div id="tracekit-overview-nn9iogjw0"></div>
            <script>
              TraceKit.overview({
                apiKey: 'your-widget-api-key-here', // Get from https://app.tracekit.dev
                container: '#tracekit-overview-nn9iogjw0'
              });
            </script>
        </div>

        <div class="info">
            <h3>📋 Configuration</h3>
            <p><strong>API Key:</strong> Replace <code>your-widget-api-key-here</code> with your actual widget API key from <a href="https://app.tracekit.dev" target="_blank">TraceKit Dashboard</a></p>
            <p><strong>Service:</strong> <code>api-gateway</code> (change to your service name)</p>
            <p><strong>TraceKit URL:</strong> <code>http://localhost:8081</code></p>
            <p><strong>Test App Port:</strong> <code>8090</code></p>
        </div>

        <div class="info" style="background: #fef3c7; border-left-color: #f59e0b; margin-top: 20px;">
            <h3 style="color: #92400e;">⚠️ Debug Info</h3>
            <p style="color: #92400e;"><strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
            <p style="color: #92400e;"><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
            <p style="color: #92400e;"><strong>Server:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Built-in PHP server'; ?></p>
            <p style="color: #92400e;"><strong>Origin:</strong> <code><?php echo $_SERVER['HTTP_HOST'] ?? 'localhost:8090'; ?></code></p>
        </div>

        <div style="margin-top: 20px; padding: 15px; background: #f9fafb; border-radius: 4px; font-size: 13px; color: #6b7280;">
            <strong>How to run this test app:</strong><br>
            <code style="display: block; margin-top: 10px; padding: 10px; background: white; color: #111827;">
                cd /Users/ogbemudiaterryosayawe/Code/context.io/tracekit/widget-test<br>
                php -S localhost:8090
            </code>
            <p style="margin: 10px 0 0 0;">Then open: <a href="http://localhost:8090" target="_blank" style="color: #3b82f6;">http://localhost:8090</a></p>
        </div>
    </div>
</body>
</html>
