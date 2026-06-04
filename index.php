<?php
/**
 * Failsafe Sovereign Docs Mirror - Index Viewer
 * Dark glassmorphism design with responsive markdown rendering.
 */

// List available markdown files in current directory
$files = glob("*.md");
sort($files);

$selected_file = isset($_GET['file']) ? $_GET['file'] : '';
// Secure file parameter to prevent directory traversal
if ($selected_file && !in_array($selected_file, $files)) {
    $selected_file = '';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos Soberanos | Failsafe ECO</title>
    
    <!-- Meta Tags para SEO -->
    <meta name="description" content="Mirror pÃºblico sanitizado dos documentos soberanos e marcos do ecossistema Failsafe ECO.">
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Marked (Markdown Parser) and Prism (Code Syntax Highlighting) -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <style>
        :root {
            --bg-main: #0B0F19;
            --bg-card: rgba(17, 24, 39, 0.7);
            --bg-card-hover: rgba(26, 36, 57, 0.85);
            --border-color: rgba(255, 255, 255, 0.08);
            --border-color-hover: rgba(99, 102, 241, 0.3);
            
            --text-primary: #F3F4F6;
            --text-secondary: #9CA3AF;
            --text-muted: #6B7280;
            
            --clr-accent: #6366F1;
            --clr-accent-glow: rgba(99, 102, 241, 0.4);
            --clr-accent-grad: linear-gradient(135deg, #6366F1 0%, #A855F7 100%);
            
            --font-heading: 'Outfit', 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --font-body: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-primary);
            font-family: var(--font-body);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Ambient Glows */
        .bg-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.08) 0%, rgba(0,0,0,0) 70%);
            top: -150px;
            right: -150px;
            z-index: -1;
            pointer-events: none;
        }

        .bg-glow-left {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.05) 0%, rgba(0,0,0,0) 70%);
            bottom: -150px;
            left: -150px;
            z-index: -1;
            pointer-events: none;
        }

        .app-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            min-height: 100vh;
        }

        /* Header */
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            font-size: 2rem;
            background: var(--clr-accent-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .logo-text h1 {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .logo-text h1 span {
            color: #A855F7;
        }

        .logo-text p {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Layout Grid */
        .docs-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 2rem;
            align-items: start;
            flex-grow: 1;
        }

        /* Sidebar card */
        .sidebar-card {
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
            position: sticky;
            top: 2rem;
        }

        .sidebar-title {
            font-family: var(--font-heading);
            font-size: 1.1rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 0.75rem;
        }

        .doc-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .doc-item a {
            display: flex;
            flex-direction: column;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            border: 1px solid transparent;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.02);
        }

        .doc-item a:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
            border-color: rgba(99, 102, 241, 0.15);
        }

        .doc-item.active a {
            color: var(--text-primary);
            background: rgba(99, 102, 241, 0.12);
            border-color: var(--clr-accent);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.1);
        }

        .doc-name {
            font-size: 0.9rem;
            font-weight: 500;
            word-break: break-all;
        }

        .doc-meta {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
            display: flex;
            justify-content: space-between;
        }

        /* Reader Area */
        .reader-card {
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2.5rem;
            min-height: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .reader-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 450px;
            color: var(--text-muted);
            text-align: center;
            gap: 1rem;
        }

        .reader-placeholder-icon {
            font-size: 3rem;
            background: var(--clr-accent-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.6;
        }

        /* Markdown Rendering Styles */
        .markdown-body {
            color: var(--text-primary);
        }

        .markdown-body h1, .markdown-body h2, .markdown-body h3, .markdown-body h4 {
            font-family: var(--font-heading);
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            color: #FFF;
        }

        .markdown-body h1 {
            font-size: 1.8rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 0.5rem;
        }

        .markdown-body h2 {
            font-size: 1.4rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 0.3rem;
        }

        .markdown-body h3 {
            font-size: 1.15rem;
        }

        .markdown-body p {
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .markdown-body code {
            font-family: 'Consolas', monospace;
            background: rgba(255, 255, 255, 0.06);
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .markdown-body pre code {
            background: none;
            padding: 0;
        }

        .markdown-body pre {
            background: #1e1e2e;
            padding: 1.25rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            margin-bottom: 1.25rem;
        }

        .markdown-body ul, .markdown-body ol {
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            color: var(--text-secondary);
        }

        .markdown-body li {
            margin-bottom: 0.25rem;
        }

        .markdown-body blockquote {
            border-left: 4px solid var(--clr-accent);
            background: rgba(99, 102, 241, 0.05);
            padding: 1rem;
            border-radius: 0 0.5rem 0.5rem 0;
            margin-bottom: 1.25rem;
            color: var(--text-secondary);
        }

        .markdown-body blockquote p {
            margin-bottom: 0;
        }

        .markdown-body table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.25rem;
        }

        .markdown-body th, .markdown-body td {
            border: 1px solid var(--border-color);
            padding: 0.75rem;
            text-align: left;
        }

        .markdown-body th {
            background: rgba(255, 255, 255, 0.03);
            font-weight: 600;
        }

        .markdown-body td {
            color: var(--text-secondary);
        }

        .markdown-body hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 1.5rem 0;
        }

        /* Alert block types custom rendering */
        .markdown-body blockquote.alert-important {
            border-left-color: var(--clr-accent);
            background: rgba(99, 102, 241, 0.05);
        }
        .markdown-body blockquote.alert-note {
            border-left-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
        }
        .markdown-body blockquote.alert-tip {
            border-left-color: #10b981;
            background: rgba(16, 185, 129, 0.05);
        }
        .markdown-body blockquote.alert-warning {
            border-left-color: #f59e0b;
            background: rgba(245, 158, 11, 0.05);
        }

        /* Footer */
        .main-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: auto;
        }

        .version-tag {
            color: var(--clr-accent);
            font-weight: 500;
        }

        @media (max-width: 900px) {
            .docs-layout {
                grid-template-columns: 1fr;
            }

            .sidebar-card {
                max-height: 250px;
                position: static;
            }

            .reader-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-glow"></div>
    <div class="bg-glow-left"></div>
    
    <div class="app-container">
        <!-- Header -->
        <header class="main-header">
            <div class="logo-area">
                <span class="logo-icon">â–²</span>
                <div class="logo-text">
                    <h1>FAILSAFE <span>ECO</span></h1>
                    <p class="subtitle">Documentos Soberanos Sanitizados</p>
                </div>
            </div>
            <div class="version-tag">docs.failsafe.com.br</div>
        </header>

        <!-- Layout Grid -->
        <main class="docs-layout">
            <!-- Sidebar -->
            <aside class="sidebar-card">
                <h3 class="sidebar-title">Documentos</h3>
                <ul class="doc-list">
                    <?php foreach ($files as $file): ?>
                        <?php 
                        $active_class = ($selected_file === $file) ? 'class="doc-item active"' : 'class="doc-item"';
                        $size_formatted = round(filesize($file) / 1024, 1) . ' KB';
                        $modified_time = date("d/m/Y H:i", filemtime($file));
                        ?>
                        <li <?php echo $active_class; ?>>
                            <a href="?file=<?php echo urlencode($file); ?>">
                                <span class="doc-name"><?php echo htmlspecialchars($file); ?></span>
                                <span class="doc-meta">
                                    <span><?php echo $size_formatted; ?></span>
                                    <span><?php echo $modified_time; ?></span>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>

            <!-- Reader Card -->
            <section class="reader-card">
                <?php if ($selected_file): ?>
                    <article class="markdown-body" id="markdown-viewer">
                        <!-- Will be populated dynamically via JavaScript client-side to ensure syntax highlighting -->
                        <div class="reader-placeholder">
                            <span class="spinner"></span>
                            <p>Carregando e renderizando o documento...</p>
                        </div>
                    </article>
                <?php else: ?>
                    <div class="reader-placeholder">
                        <div class="reader-placeholder-icon">ðŸ“–</div>
                        <h2>Selecione um documento</h2>
                        <p>Escolha um dos arquivos na barra lateral para ler a especificaÃ§Ã£o tÃ©cnica.</p>
                    </div>
                <?php endif; ?>
            </section>
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            <p>Failsafe ECO Document Portal â€¢ Atualizado dinamicamente via Ponte de Controle.</p>
            <p class="version-tag">Mirror v0.1-alpha â€¢ HostGator</p>
        </footer>
    </div>

    <?php if ($selected_file): ?>
        <script>
            // Fetch raw markdown and render it
            const fileUrl = <?php echo json_encode($selected_file); ?>;
            fetch(fileUrl)
                .then(response => response.text())
                .then(text => {
                    // Custom Alert markup compatibility (> [!NOTE])
                    let parsedText = text.replace(/>\s*\[!(NOTE|TIP|IMPORTANT|WARNING|CAUTION)\]([\s\S]*?)(?=\n[^>]|\n\n|$)/gi, (match, type, content) => {
                        const alertClass = type.toLowerCase();
                        const cleanContent = content.replace(/^>\s?/gm, '').trim();
                        return `<blockquote class="alert-${alertClass}"><strong>${type}</strong><br>${cleanContent}</blockquote>`;
                    });

                    // Render markdown using Marked.js
                    document.getElementById('markdown-viewer').innerHTML = marked.parse(parsedText);
                    
                    // Trigger Prism syntax highlighting for code blocks
                    Prism.highlightAll();
                })
                .catch(err => {
                    document.getElementById('markdown-viewer').innerHTML = `
                        <div class="reader-placeholder" style="color: var(--clr-danger)">
                            <div style="font-size: 3rem">âš ï¸</div>
                            <h2>Erro de carregamento</h2>
                            <p>NÃ£o foi possÃ­vel carregar o arquivo selecionado.</p>
                        </div>
                    `;
                });
        </script>
    <?php endif; ?>
</body>
</html>

