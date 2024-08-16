# 使用官方的 Python 基礎映像
FROM python:3.9-slim

# 設定工作目錄
WORKDIR /app

# 複製要求檔到容器中
COPY requirements.txt .

# 安裝 Python 依賴
RUN pip install --no-cache-dir -r requirements.txt

# 複製應用程序文件到容器中
COPY . .

# 設定環境變量
ENV FLASK_APP=app.py
ENV FLASK_RUN_HOST=0.0.0.0
ENV FLASK_RUN_PORT=3000

# 暴露容器端口
EXPOSE 3000

# 啟動應用程序
CMD ["flask", "run"]
