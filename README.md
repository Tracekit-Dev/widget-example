# TraceKit Widget Test Application

This is a test application demonstrating how to embed TraceKit widgets into your website or application.

## 🚀 Quick Start

### Running the Test App

```bash
cd /Users/ogbemudiaterryosayawe/Code/context.io/tracekit/widget-test
php -S localhost:8090
```

Then open http://localhost:8090 in your browser.

## 📦 Widget Types

TraceKit provides four types of embeddable widgets:

### 1. Service Badge Widget
A compact widget showing service health status, metrics, and trends.

```html
<div id="my-badge"></div>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.badge({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'api-gateway',
    container: '#my-badge',
    theme: 'light',              // 'light' or 'dark'
    showMetrics: true,           // Show response time and uptime
    showTrend: true              // Show sparkline chart
  });
</script>
```

### 2. Metrics Dashboard Widget
A full metrics dashboard with detailed charts and timeseries data.

```html
<div id="my-metrics"></div>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.metrics({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'api-gateway',
    container: '#my-metrics',
    timeRange: '24h',            // '1h', '24h', '7d', '30d'
    theme: 'light'
  });
</script>
```

### 3. Alerts Summary Widget
Display active alerts and system status.

```html
<div id="my-alerts"></div>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.alerts({
    apiKey: 'tk_widget_xxxxx',
    container: '#my-alerts',
    theme: 'light'
  });
</script>
```

### 4. Multi-Service Overview Widget
Show health status across all your services.

```html
<div id="my-overview"></div>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.overview({
    apiKey: 'tk_widget_xxxxx',
    container: '#my-overview',
    theme: 'light'
  });
</script>
```

## 🎨 Customization

### Theme Support

All widgets support both light and dark themes:

```javascript
TraceKit.badge({
  apiKey: 'tk_widget_xxxxx',
  serviceName: 'api-gateway',
  container: '#my-widget',
  theme: 'dark'  // Use 'light' or 'dark'
});
```

### Custom Styling

You can override default widget styles with CSS:

```html
<style>
  /* Custom badge styles */
  #my-badge.tracekit-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    color: white !important;
    border-radius: 20px !important;
  }

  /* Custom service item hover effect */
  .tracekit-service-item:hover {
    transform: translateX(5px) !important;
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3) !important;
  }
</style>
```

### Inline Custom Styles

You can also pass custom inline styles:

```javascript
TraceKit.badge({
  apiKey: 'tk_widget_xxxxx',
  serviceName: 'api-gateway',
  container: '#my-widget',
  customStyles: 'background: #f0f9ff; border: 2px solid #0ea5e9; border-radius: 12px;'
});
```

## 🔑 Getting Your API Key

1. Log in to your TraceKit account
2. Navigate to **Settings → Widgets**
3. Click **"Create New Widget"**
4. Configure your widget settings:
   - **Widget Name**: A descriptive name (e.g., "Status Page Widget")
   - **Service Scope**: Choose "All Services" or a specific service
   - **Allowed Domains**: Add your domain (e.g., `*.yourdomain.com`) or leave empty for testing
   - **Rate Limit**: Set requests per minute (default: 60)
5. Copy the generated API key (format: `tk_widget_xxxxx`)

## 🔒 Security

### Domain Restrictions

For production use, always specify allowed domains:

```javascript
// In your TraceKit widget settings, set:
// Allowed Domains: yourdomain.com, *.yourdomain.com
```

⚠️ **Warning**: Leaving the domain field empty allows all domains. This is **not recommended for production**.

### Rate Limiting

Widget API keys are rate-limited to prevent abuse:
- Default: 60 requests per minute
- Configurable per key in widget settings
- Returns `429 Too Many Requests` when exceeded

## 📊 Widget Options Reference

### Badge Widget Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `apiKey` | string | required | Your widget API key |
| `serviceName` | string | required | Name of the service to monitor |
| `container` | string | required | CSS selector for container element |
| `theme` | string | `'light'` | Theme: `'light'` or `'dark'` |
| `showMetrics` | boolean | `true` | Show response time and uptime metrics |
| `showTrend` | boolean | `true` | Show sparkline trend chart |
| `customStyles` | string | `''` | Custom inline CSS styles |

### Metrics Dashboard Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `apiKey` | string | required | Your widget API key |
| `serviceName` | string | required | Name of the service |
| `container` | string | required | CSS selector for container element |
| `timeRange` | string | `'24h'` | Time range: `'1h'`, `'24h'`, `'7d'`, `'30d'` |
| `theme` | string | `'light'` | Theme: `'light'` or `'dark'` |
| `customStyles` | string | `''` | Custom inline CSS styles |

### Alerts Summary Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `apiKey` | string | required | Your widget API key |
| `container` | string | required | CSS selector for container element |
| `theme` | string | `'light'` | Theme: `'light'` or `'dark'` |
| `customStyles` | string | `''` | Custom inline CSS styles |

### Overview Widget Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `apiKey` | string | required | Your widget API key |
| `container` | string | required | CSS selector for container element |
| `theme` | string | `'light'` | Theme: `'light'` or `'dark'` |
| `customStyles` | string | `''` | Custom inline CSS styles |

## 🎯 Use Cases

### Status Page

Embed widgets on your public status page to show real-time service health:

```html
<!DOCTYPE html>
<html>
<head>
  <title>System Status</title>
</head>
<body>
  <h1>System Status</h1>

  <!-- Overview of all services -->
  <div id="status-overview"></div>

  <!-- Active alerts -->
  <div id="active-alerts"></div>

  <script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
  <script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
  <script>
    TraceKit.overview({
      apiKey: 'tk_widget_xxxxx',
      container: '#status-overview'
    });

    TraceKit.alerts({
      apiKey: 'tk_widget_xxxxx',
      container: '#active-alerts'
    });
  </script>
</body>
</html>
```

### Documentation Site

Show service health in your documentation:

```html
<div class="service-status">
  <h3>API Status</h3>
  <div id="api-status"></div>
</div>

<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.badge({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'api-gateway',
    container: '#api-status',
    showTrend: false
  });
</script>
```

### Dashboard

Embed detailed metrics in your internal dashboard:

```html
<div id="performance-metrics"></div>

<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>
<script>
  TraceKit.metrics({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'api-gateway',
    container: '#performance-metrics',
    timeRange: '7d'
  });
</script>
```

## 🔧 Advanced Usage

### Multiple Widgets on One Page

You can have multiple widgets on the same page:

```html
<!-- Load scripts once -->
<script src="https://app.tracekit.dev/static/js/tracekit-widgets.js"></script>
<script src="https://app.tracekit.dev/static/js/tracekit-widgets-ui.js"></script>

<!-- Widget 1 -->
<div id="api-badge"></div>
<script>
  TraceKit.badge({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'api-gateway',
    container: '#api-badge'
  });
</script>

<!-- Widget 2 -->
<div id="db-badge"></div>
<script>
  TraceKit.badge({
    apiKey: 'tk_widget_xxxxx',
    serviceName: 'database',
    container: '#db-badge'
  });
</script>
```

### Responsive Design

Widgets are responsive by default. For mobile optimization:

```css
@media (max-width: 640px) {
  .tracekit-badge-metrics {
    grid-template-columns: 1fr !important;
  }
}
```

### Auto-refresh

Widgets update automatically. To manually refresh:

```javascript
// Re-initialize the widget to refresh data
TraceKit.badge({
  apiKey: 'tk_widget_xxxxx',
  serviceName: 'api-gateway',
  container: '#my-badge'
});
```

## 🐛 Troubleshooting

### Widget Not Loading

1. **Check API Key**: Ensure your API key starts with `tk_widget_`
2. **Check Domain**: If you've set allowed domains, make sure your current domain is listed
3. **Check Console**: Open browser DevTools and check for error messages
4. **Check CORS**: Ensure you're loading scripts from the correct domain

### 403 Forbidden Error

This usually means:
- Your domain is not in the allowed domains list
- The API key is revoked or inactive
- Rate limit exceeded

### Widget Shows "Loading..."

- Check your internet connection
- Verify the TraceKit API is accessible
- Check browser console for network errors

## 📝 Full Example

See `index.php` in this directory for a complete working example with:
- All four widget types
- Custom styling examples
- Dark theme support
- Multiple widgets on one page

## 🔗 Resources

- [TraceKit Documentation](https://docs.tracekit.dev)
- [Widget Settings](https://app.tracekit.dev/settings/widgets)
- [Support](mailto:support@tracekit.dev)

## 📄 License

TraceKit widgets are provided as part of your TraceKit subscription.
