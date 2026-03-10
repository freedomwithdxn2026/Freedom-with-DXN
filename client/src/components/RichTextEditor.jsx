import { useRef, useEffect, useCallback } from 'react';
import DOMPurify from 'dompurify';
import {
  FiBold, FiItalic, FiUnderline, FiLink, FiImage, FiMinus,
  FiAlignLeft, FiAlignCenter, FiAlignRight, FiList,
} from 'react-icons/fi';

const COLORS = [
  '#000000', '#16392d', '#0c3935', '#dfc378', '#dc2626',
  '#2563eb', '#7c3aed', '#d97706', '#059669', '#6b7280',
];

function ToolBtn({ onClick, title, active, children }) {
  return (
    <button
      type="button"
      onMouseDown={(e) => { e.preventDefault(); onClick(); }}
      className={`w-8 h-8 flex items-center justify-center rounded transition-colors relative group
        ${active ? 'bg-dxn-gold/30 text-dxn-gold' : 'text-gray-300 hover:bg-white/10 hover:text-dxn-gold'}`}
      title={title}
    >
      {children}
      <span className="absolute -bottom-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[10px] px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-50">
        {title}
      </span>
    </button>
  );
}

function Divider() {
  return <span className="w-px h-6 bg-white/20 mx-1 shrink-0" />;
}

export default function RichTextEditor({ value, onChange, placeholder = 'Start writing...' }) {
  const editorRef = useRef(null);
  const isInternalChange = useRef(false);

  // Set initial content
  useEffect(() => {
    if (editorRef.current && !isInternalChange.current) {
      if (value && editorRef.current.innerHTML !== value) {
        editorRef.current.innerHTML = value;
      }
    }
  }, [value]);

  const exec = useCallback((command, val = null) => {
    editorRef.current?.focus();
    document.execCommand(command, false, val);
    syncContent();
  }, []);

  const syncContent = useCallback(() => {
    if (editorRef.current) {
      isInternalChange.current = true;
      const html = editorRef.current.innerHTML;
      const clean = DOMPurify.sanitize(html, {
        ALLOWED_TAGS: [
          'p', 'br', 'b', 'strong', 'i', 'em', 'u', 'h1', 'h2', 'h3',
          'ul', 'ol', 'li', 'a', 'img', 'blockquote', 'hr', 'div', 'span', 'font',
        ],
        ALLOWED_ATTR: ['href', 'src', 'alt', 'style', 'target', 'color', 'class'],
      });
      onChange(clean);
      setTimeout(() => { isInternalChange.current = false; }, 0);
    }
  }, [onChange]);

  const handleInput = useCallback(() => {
    syncContent();
  }, [syncContent]);

  const handleKeyDown = useCallback((e) => {
    if (e.key === 'Tab') {
      e.preventDefault();
      exec('insertHTML', '&nbsp;&nbsp;&nbsp;&nbsp;');
    }
  }, [exec]);

  const handlePaste = useCallback((e) => {
    e.preventDefault();
    const text = e.clipboardData.getData('text/plain');
    exec('insertText', text);
  }, [exec]);

  const insertLink = () => {
    const url = prompt('Enter URL:');
    if (url) exec('createLink', url);
  };

  const insertImage = () => {
    const url = prompt('Enter image URL:');
    if (url) exec('insertHTML', `<img src="${DOMPurify.sanitize(url)}" alt="image" style="max-width:100%;height:auto;border-radius:8px;margin:8px 0;" />`);
  };

  const insertHR = () => {
    exec('insertHTML', '<hr style="border:none;border-top:2px solid #e5e7eb;margin:16px 0;" />');
  };

  const setTextColor = (color) => {
    exec('foreColor', color);
  };

  const formatBlock = (tag) => {
    exec('formatBlock', tag);
  };

  return (
    <div className="border border-gray-300 rounded-lg overflow-hidden">
      {/* Toolbar */}
      <div className="bg-dxn-darkgreen px-3 py-2 flex flex-wrap items-center gap-1 sticky top-24 z-40">
        <ToolBtn onClick={() => exec('bold')} title="Bold">
          <FiBold size={14} />
        </ToolBtn>
        <ToolBtn onClick={() => exec('italic')} title="Italic">
          <FiItalic size={14} />
        </ToolBtn>
        <ToolBtn onClick={() => exec('underline')} title="Underline">
          <FiUnderline size={14} />
        </ToolBtn>

        <Divider />

        <ToolBtn onClick={() => formatBlock('h1')} title="Heading 1">
          <span className="text-xs font-black">H1</span>
        </ToolBtn>
        <ToolBtn onClick={() => formatBlock('h2')} title="Heading 2">
          <span className="text-xs font-bold">H2</span>
        </ToolBtn>
        <ToolBtn onClick={() => formatBlock('h3')} title="Heading 3">
          <span className="text-xs font-semibold">H3</span>
        </ToolBtn>
        <ToolBtn onClick={() => formatBlock('p')} title="Paragraph">
          <span className="text-xs font-medium">P</span>
        </ToolBtn>

        <Divider />

        <ToolBtn onClick={() => exec('insertUnorderedList')} title="Bullet List">
          <FiList size={14} />
        </ToolBtn>
        <ToolBtn onClick={() => exec('insertOrderedList')} title="Numbered List">
          <span className="text-xs font-bold">1.</span>
        </ToolBtn>
        <ToolBtn onClick={() => formatBlock('blockquote')} title="Blockquote">
          <span className="text-base leading-none font-serif">&ldquo;</span>
        </ToolBtn>

        <Divider />

        <ToolBtn onClick={insertLink} title="Insert Link">
          <FiLink size={14} />
        </ToolBtn>
        <ToolBtn onClick={insertImage} title="Insert Image">
          <FiImage size={14} />
        </ToolBtn>
        <ToolBtn onClick={insertHR} title="Horizontal Line">
          <FiMinus size={14} />
        </ToolBtn>

        <Divider />

        <ToolBtn onClick={() => exec('justifyLeft')} title="Align Left">
          <FiAlignLeft size={14} />
        </ToolBtn>
        <ToolBtn onClick={() => exec('justifyCenter')} title="Align Center">
          <FiAlignCenter size={14} />
        </ToolBtn>
        <ToolBtn onClick={() => exec('justifyRight')} title="Align Right">
          <FiAlignRight size={14} />
        </ToolBtn>

        <Divider />

        {/* Color picker */}
        <div className="relative group">
          <button
            type="button"
            className="w-8 h-8 flex items-center justify-center rounded text-gray-300 hover:bg-white/10 hover:text-dxn-gold transition-colors"
            title="Text Color"
            onMouseDown={(e) => e.preventDefault()}
          >
            <span className="text-xs font-bold">A</span>
            <span className="absolute bottom-1 left-1/2 -translate-x-1/2 w-4 h-1 bg-gradient-to-r from-red-500 via-yellow-500 to-blue-500 rounded-full" />
          </button>
          <div className="absolute top-full left-0 mt-1 bg-white rounded-lg shadow-xl p-2 grid grid-cols-5 gap-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
            {COLORS.map((c) => (
              <button
                key={c}
                type="button"
                onMouseDown={(e) => { e.preventDefault(); setTextColor(c); }}
                className="w-6 h-6 rounded border border-gray-200 hover:scale-125 transition-transform"
                style={{ backgroundColor: c }}
                title={c}
              />
            ))}
          </div>
        </div>
      </div>

      {/* Editor area */}
      <div
        ref={editorRef}
        contentEditable
        onInput={handleInput}
        onKeyDown={handleKeyDown}
        onPaste={handlePaste}
        className="min-h-[400px] p-6 bg-white text-gray-800 leading-relaxed focus:outline-none rich-editor"
        data-placeholder={placeholder}
        suppressContentEditableWarning
      />
    </div>
  );
}
